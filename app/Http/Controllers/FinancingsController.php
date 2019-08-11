<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Repositories\FinancingsRepo as Repo;
use Illuminate\Routing\Route;

class FinancingsController extends Controller
{

    protected $repo;
    protected $module;
    protected $route;

    public function __construct(Repo $repo, Route $route)
    {
        $this->repo = $repo;
        $this->route = $route;
        $confFile = 'financings';

        // nombre de archivo de configuracion

        $this->confFile = $confFile;
        $this->data['confFile'] = $confFile;

    }


}
