<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Repositories\ArchiveTypesRepo as Repo;
use Illuminate\Routing\Route;
use function strtolower;
use function strtotime;

class ArchiveTypesController extends Controller
{

    protected $repo;
    protected $module;
    protected $route;

    public function __construct(Repo $repo, Route $route)
    {
        $this->repo = $repo;
        $this->route = $route;
        $confFile = 'archiveTypes';

        // nombre de archivo de configuracion

        $this->confFile = $confFile;
        $this->data['confFile'] = $confFile;

    }


    public function store(Request $request)
    {
        //validacion del formulario
        $request->validate(config($this->confFile.'.validationsStore'),config($this->confFile.'.messagesStore'));

        $datos = $request->only('name');
        $datos['slug'] = strtolower(str_replace(' ', '_',$request->get('name')));

        $this->repo->create($datos);

        return redirect()->route(config($this->confFile.".viewIndex"))->with('ok','Registro Creado.');
    }

    public function update(Request $request)
    {
        $request->validate(config($this->confFile.'.validationsUpdate'),config($this->confFile.'.messagesUpdate'));

        $model = $this->repo->find($this->route->id);

        $model->fill($request->only('name'));

        $model->slug = strtolower(str_replace(' ', '_',$request->get('name')));

        $model->save();

        return redirect()->route(config($this->confFile.".viewIndex"))->with('ok','Registro Editado.');
    }
}
