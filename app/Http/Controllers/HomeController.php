<?php

namespace App\Http\Controllers;

use App\Entities\Loans;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $this->data['loans'] = DB::table('loans')
            ->join('clients', 'loans.client_id', '=', 'clients.id')
            ->join('client_user', 'client_user.client_id', '=', 'clients.id')
            ->where('client_user.user_id', '=', auth()->user()->id)
            ->selectRaw('loans.id, amount, dues, loans.created_at, clients.id as client_id, clients.name, clients.last_name')->orderBy('created_at', 'DESC')->take(3)->get();

        $carbon = Carbon::now('America/Argentina/Buenos_Aires')->locale('es');

        $this->data['paid'] = DB::table('payments')
            ->join("loans", "payments.loans_id", "=", "loans.id")
            ->join("clients", "loans.client_id", "=", "clients.id")
            ->where("loans.user_id",'=',Auth::user()->id)
            ->where('state','=',0)
            ->whereBetween('payments.payment_date',[$carbon->startOfWeek(Carbon::MONDAY)->format('Y-m-d'),$carbon->endOfWeek(Carbon::SUNDAY)->format('Y-m-d')])
            ->selectRaw("payments.id, payments.due, DATE_FORMAT(payments.payment_date,'%d/%m/%Y') as payment_date, payments.amount_payable, payments.state, payments.loans_id, loans.client_id, loans.amount, CONCAT(clients.last_name,', ', clients.name) as fullname, ROUND(((payments.due * 100) / loans.dues ),2) as dues, loans.dues as total_dues")
            ->orderBy('payments.created_at','DESC')
            ->get();

        return view('dashboard')->with($this->data);
    }
}
