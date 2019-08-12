<?php

namespace App\Http\Controllers;

use App\Entities\AccreditationType;
use App\Entities\AdditionalCost;
use App\Entities\Archive;
use App\Entities\ArchiveType;
use App\Entities\Client;
use App\Entities\DniType;
use App\Entities\Financing;
use App\Entities\Loan;
use App\Entities\Payments;
use App\Http\Repositories\ClientsRepo;
use App\Http\Repositories\LoansRepo;
use Barryvdh\DomPDF\PDF;
use Carbon\Carbon;
use function config;
use function floatval;
use function floatValue;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use function intval;
use NumerosEnLetras;
use function public_path;
use function round;
use function storage_path;

class FormsController extends Controller
{

    protected $repo;
    protected $module;
    protected $route;
    protected $clientsRepo;
    protected $estado;

    public function __construct(Route $route, Request $request, ClientsRepo $clientsRepo, LoansRepo $loansRepo)
    {
        $this->route = $route;
        $confFile = 'forms';

        $this->clientsRepo = $clientsRepo;
        $this->repo = $loansRepo;

        // nombre de archivo de configuracion
        $this->confFile = $confFile;
        $this->data['confFile'] = $confFile;

        $this->data['provinces'] = config('utilities.provinces');

        $this->request = $request;
        $this->route = $route;
        $this->route = $route;

    }

    public function index()
    {
        $this->data['models'] = $this->repo->getAll();

        return view(config($this->confFile . ".viewIndex"))->with($this->data);
    }


    public function create()
    {
        $this->data['clients'] = $this->clientsRepo->getClientList();

        $this->data['dniTypes'] = DniType::all()->pluck('type', 'id');
        $this->data['accreditationsType'] = AccreditationType::all()->pluck('type', 'id');
        $this->data['financing'] = Financing::all();

        return parent::create(); // TODO: Change the autogenerated stub
    }

    public function store(Request $request)
    {
        //validacion del formulario
        $request->validate(config($this->confFile . '.validationsStore'), config($this->confFile . '.messagesStore'));


        $month = Carbon::create('America/Argentina/Buenos_Aires')->locale('es')->format('m');
        $year = Carbon::create('America/Argentina/Buenos_Aires')->locale('es')->format('Y');

        $payment_day = Carbon::create("$year-$month-10",'America/Argentina/Buenos_Aires');

        // plan de pagos

        $dues = Financing::all()->pluck('porcent', 'due');
        $monto = floatval($this->request->amount);
        $cuota = intval(Financing::find($request->financing_id)->due);
        $tasa = floatval($dues->first());

        $porcentajeCuota = ($tasa / 100) / 12;
        $porcentajeCuota = floatval($porcentajeCuota);

        $valCuota = $monto * ($porcentajeCuota / (1 - pow(1 + $porcentajeCuota,((-1) * $cuota))));

        $tasaActual = Financing::find($request->financing_id)->porcent;
        $tasaActual = floatval($tasaActual);

        $tna = round(($tasaActual / 100) * 12,2);

        // tasa efectiva anual
        $tea = floatval((pow((1 + ($tasaActual/100)),12))-1);

        // tasa efectiva mensual
        $tem = floatval(((pow((1 + $tea),(30/360)))-1) * 100);

        // costo financiero total
        $additionalCosts = AdditionalCost::all();

        $cft = round(floatval((($monto * ($tasaActual / 100)) + $additionalCosts[0]->amount + ( $additionalCosts[1]->amount * 12) + ($additionalCosts[2]->amount * 12)) / $monto) * 100,2);

        $interesPagado = 0.0000;
        $amortizacionPagado = 0.0000;
        $valorDeudaASaldar = $monto;

        $payments = collect();

        for ($i = 0; $i < $cuota; $i++):
            if ($i >= 2)
                $tasa = $dues->get($i);


            $interesPagado = $valorDeudaASaldar * $porcentajeCuota;
            $amortizacionPagado = $valCuota - $interesPagado;
            $valorDeudaASaldar = $valorDeudaASaldar - $amortizacionPagado;

            $ind = $i + 1;

            $payment_day = $payment_day->add('1 month');

            $payments->push(["due" => $ind, "tasa" => $tasa, "interesesPagado" => round($interesPagado,2), "amorizacionPagado" => round($amortizacionPagado,2), "valorDeudaASaldar" => round($valorDeudaASaldar,2),"amount_payable" => round(($interesPagado + $amortizacionPagado),2),"payment_date" => $payment_day->format('Y-m-d')]);

        endfor;
        // Fin de plan de pagos



        // busco al cliente
        $cliente = Client::find($this->request->searchClient);

        // Actualizar los datos del cliente
        $datosCliente = $this->request->only(['cbu', 'name','ca', 'last_name', 'dni_type_id', 'dni','cuil', 'address', 'city', 'province', 'cp', 'ca','phone', 'cel', 'job_name', 'job_address', 'job_city', 'job_province', 'job_phone']);

        if (!$cliente):
            $datos = new Request($datosCliente);

            $this->validate($datos, config('clients.validationsStore'),config('clients.messagesStore'));

            $cliente = Client::create($datosCliente);
        else:
            $datos = new Request($datosCliente);

            $validaciones = config('clients.validationsUpdate');
            $validaciones['dni'] = "numeric|unique:clients,dni,".$cliente->id;
            $validaciones['cuil'] = "numeric|unique:clients,cuil,".$cliente->id;

            $this->validate($datos,$validaciones,config('clients.messagesUpdate'));

            $cliente->update($datosCliente);
        endif;


        // Guardar los datos del presupuesto
        $datosPrestamo = $this->request->only(['amount', 'financing_id', 'cbu', 'cft', 'tem', 'accreditation_type_id',"instruction1_amount","instruction1_pay_date","instruction1_payment","instruction1_order","instruction2_amount","instruction2_pay_date","instruction2_payment","instruction2_order","instruction3_amount","instruction3_pay_date","instruction3_payment","instruction3_order","instruction4_amount","instruction4_pay_date","instruction4_payment","instruction4_order","cancellation1_amount","cancellation1_pay_date","cancellation1_payment","cancellation1_order","cancellation2_amount","cancellation2_pay_date","cancellation2_payment","cancellation2_order"]);

        $dues = Financing::find($datosPrestamo['financing_id']);

        if (!$dues)
            return redirect()->back()->withInput()->withErrors("La cantidad de cuotas ingresado no es correcta");

        $datosPrestamo['client_id'] = $cliente->id;

        $datosPrestamo['dues'] = $dues->due;

        $datosPrestamo['tna'] = $tna;

        $datosPrestamo['tem'] = $tem;

        $datosPrestamo['cft'] = $cft;

        $datosPrestamo['user_id'] = Auth::user()->id;


        // Pongo el estado en PENDIENTE
        $datosPrestamo['status'] = 1;

//        Código
        $ultimoid = DB::table('loans')->select(DB::raw('MAX(id) as id'));

        if($ultimoid->count() === 0)
            $ultimoid = 1;
        else
            $ultimoid = $ultimoid->first()->id + 1;


        $datosPrestamo['code'] = "DLP".$ultimoid;

        $loan = $this->repo->create($datosPrestamo);


        // Crear el plan de pagos
        foreach($payments as $payment):
            $pago = [
                "due" => $payment['due'],
                "payment_date" => $payment["payment_date"],
                "amount_payable" => $payment["amount_payable"],
                "amount_paid" => null,
                "state" => 0,
                "loans_id" => $loan->id
            ];

            Payments::create($pago);
        endforeach;
        // Fin crear plan de pagos

        return redirect()->route(config($this->confFile . ".viewIndex"))->with('ok', 'Registro Creado.');

    }


    public function edit()
    {
        $this->data['clients'] = $this->clientsRepo->getClientList();
        $this->data['provinces'] = ["Capital Federal", "Buenos Aires", "Catamarca", "Chaco", "Chubut", "Córdoba", "Corrientes", "Entre Ríos", "Formosa", "Jujuy", "La Pampa", "La Rioja", "Mendoza", "Misiones", "Neuquén", "Río Negro", "Salta", "San Juan", "San Luis", "Santa Cruz", "Santa Fe", "Santiago Del Estero", "Tierra Del Fuego", "Tucuman"];
        $this->data['dniTypes'] = DniType::all()->pluck('type', 'id');
        $this->data['accreditationsType'] = AccreditationType::all()->pluck('type', 'id');
        $this->data['financing'] = Financing::all();
        $this->data['archiveTypes'] = ArchiveType::all();


        $this->data['model']= Loan::with('Archives')->find($this->route->id);

        return view(config($this->confFile.".viewForm"))->with($this->data);
    }

    public function update(Request $request)
    {
        $request->validate(config($this->confFile . '.validationsUpdate'), config($this->confFile . '.messagesUpdate'));

        $model = $this->repo->find($this->route->id);

        $month = Carbon::createFromTimestamp(strtotime($model->created_at),'America/Argentina/Buenos_Aires')->format('m');
        $year = Carbon::createFromTimestamp(strtotime($model->created_at),'America/Argentina/Buenos_Aires')->format('Y');

        $payment_day = Carbon::create("$year-$month-10",'America/Argentina/Buenos_Aires');

        // plan de pagos

        $dues = Financing::all()->pluck('porcent', 'due');
        $monto = floatval($this->request->amount);
        $cuota = intval(Financing::find($request->financing_id)->due);
        $tasa = floatval($dues->first());

        $porcentajeCuota = ($tasa / 100) / 12;
        $porcentajeCuota = floatval($porcentajeCuota);

        $valCuota = $monto * ($porcentajeCuota / (1 - pow(1 + $porcentajeCuota,((-1) * $cuota))));



        $tasaActual = Financing::find($request->financing_id)->porcent;
        $tasaActual = floatval($tasaActual);

        $tna = round(($tasaActual / 100) * 12,2);

        // tasa efectiva anual
        $tea = floatval((pow((1 + ($tasaActual/100)),12))-1);

        // tasa efectiva mensual
        $tem = floatval(((pow((1 + $tea),(30/360)))-1) * 100);

        // costo financiero total
        $additionalCosts = AdditionalCost::all();

        $cft = round(floatval((($monto * ($tasaActual / 100)) + $additionalCosts[0]->amount + ( $additionalCosts[1]->amount * 12) + ($additionalCosts[2]->amount * 12)) / $monto) * 100,2);


        $interesPagado = 0.0000;
        $amortizacionPagado = 0.0000;
        $valorDeudaASaldar = $monto;

        $payments = collect();

        for ($i = 0; $i < $cuota; $i++):
            if ($i >= 2)
                $tasa = $dues->get($i);


            $interesPagado = $valorDeudaASaldar * $porcentajeCuota;
            $amortizacionPagado = $valCuota - $interesPagado;
            $valorDeudaASaldar = $valorDeudaASaldar - $amortizacionPagado;

            $ind = $i + 1;

            $payment_day = $payment_day->add('1 month');

            $payments->push(["due" => $ind, "tasa" => $tasa, "interesesPagado" => round($interesPagado,2), "amorizacionPagado" => round($amortizacionPagado,2), "valorDeudaASaldar" => round($valorDeudaASaldar,2),"amount_payable" => round(($interesPagado + $amortizacionPagado),2),"payment_date" => $payment_day->format('Y-m-d')]);

        endfor;
        // Fin de plan de pagos


        $datosPrestamo = $this->request->only(['amount', 'financing_id', 'cbu', 'cft', 'tem', 'accreditation_type_id', 'dni', 'paycheck', 'contract', 'promissory_note']);

        $dues = Financing::find($datosPrestamo['financing_id']);

        if (!$dues)
            return redirect()->back()->withInput()->withErrors("La cantidad de cuotas ingresado no es correcta");

        $datosPrestamo['dues'] = $dues->due;

        $datosPrestamo['tna'] = $tna;

        $datosPrestamo['tem'] = $tem;

        $datosPrestamo['cft'] = $cft;

        $model->update($datosPrestamo);

        // Crear el plan de pagos

        $model->payments()->delete();

        foreach($payments as $payment):
            $pago = [
                "due" => $payment['due'],
                "payment_date" => $payment["payment_date"],
                "amount_payable" => $payment["amount_payable"],
                "amount_paid" => null,
                "state" => 0,
                "loans_id" => $model->id
            ];

            Payments::create($pago);
        endforeach;
        // Fin crear plan de pagos



        // Archivos adjuntos
        $user = $model->Client->id;

        foreach(ArchiveType::all() as $archiveType):
            if($request->hasFile($archiveType->slug)):
                $file = $request->file($archiveType->slug);

                $nombre = $user.'-'.$archiveType->slug.'.'.$file->extension();

                if($model->Archives->where('archive_type_id',$archiveType->id)->count() > 0):
                    $archiveType = $model->Archives->where('archive_type_id',$archiveType->id)->first();

                    $archiveType->update(['route' => 'storage/files/'.$user.'/'.$nombre]);

                    $model->Archives()->detach($archiveType->id);
                    $model->Archives()->attach($archiveType->id);
                else:
                    $archiveType = Archive::create(['route' => 'storage/files/'.$user.'/'.$nombre, 'archive_type_id' => $archiveType->id]);
                    $model->Archives()->attach($archiveType->id);
                endif;

                $file->storeAs('files/'.$user, $nombre);
            endif;
        endforeach;
        // Fin archivos adjuntos

        return redirect()->route(config($this->confFile . ".viewIndex"))->with('ok', 'Registro Editado.');
    }

    public function destroy()
    {
        $model = $this->repo->find($this->route->id);

        if(!$model)
            return redirect()->back()->withErrors('No se pudo borrar el registro');

        if($model->Archives->count() > 1):
            foreach($model->Archives as $archive):
                $archive->delete();
            endforeach;
            Storage::deleteDirectory($model->Client->id);
        endif;

        $model->delete();

        return redirect()->route(config($this->confFile.".viewIndex"))->with('ok','Registro Borrado.');
    }

    public function paymentPlan(){
        $this->data['paymentPlan'] = Loan::find($this->route->parameter('id'))->payments()->orderBy('due')->get();


        return view('forms.paymentPlan')->with($this->data);
    }


    public function contratoPdf(PDF $PDF, Loan $loans){
        $loan = $loans->with('Client','User', 'Payments','AccreditationType')->find($this->route->parameter('id'));

        if(!$loan)
            return redirect()->route('forms.index')->withErrors('El prestamo que busca no existe');


        return $PDF->loadView('forms.pdf.contrato', [ "loan" => $loan ])->stream('contrato.pdf');

    }

    public function pagarePdf(PDF $PDF, Loan $loans){
        $loan = $loans->with('Client','User', 'Payments','AccreditationType')->find($this->route->parameter('id'));

        if(!$loan)
            return redirect()->route('forms.index')->withErrors('El prestamo que busca no existe');

        return $PDF->loadView('forms.pdf.pagare', [ "loan" => $loan ])->stream('pagare.pdf');

    }

    public function liquidacionPdf(PDF $PDF, Loan $loans){
        $loan = $loans->with('Client','Payments')->find($this->route->parameter('id'));

        if(!$loan)
            return redirect()->route('forms.index')->withErrors('El prestamo que busca no existe');

        return $PDF->loadView('forms.pdf.liquidacion-de-prestamo', [ "loan" => $loan ])->stream('liquidacion-de-prestamo.pdf');

    }


}
