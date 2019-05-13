<?php namespace App\Http\Repositories;


abstract class BaseRepo
{
    protected $model;
    protected $api;

    public function __construct()
    {
        $this->model = $this->getModel();
    }

    public abstract function getModel();

    public function getAllPaginated($paginate)
    {
        return $this->model->paginate($paginate);
    }

    public function getAll()
    {
        return $this->model->all();
    }

    public function find($id)
    {
        return $this->model->find($id);
    }

    public function findOrFail($id)
    {
        return $this->model->findOrFail($id);
    }

    public function create(Array $datos)
    {
        return $this->model->create($datos);
    }

    public function edit($model, Array $datos)
    {
        $model->fill($datos);
        $model->save();

        return $model;
    }

    public function instanciar(Array $datos = [])
    {
        $model = $this->getModel();
        if (count($datos) > 0)
            $model->fill($datos);

        return $model;
    }

    public function createLog($model, $idUser, $action, $type = 'default', $titulo = '', $timelineTitulo = null, $timelineBody = '', $timelineShow = true)
    {
        $log = new Log();
        $log->user_id = $idUser;
        $log->titulo = $titulo;
        $log->action = $action;
        $log->type = $type;
        $log->timeline_show = $timelineShow;
        $log->timeline_titulo = (!is_null($timelineTitulo)) ? $timelineTitulo : $titulo;
        $log->timeline_body = $timelineBody;

        $model->logs()->save($log);

        return $log;
    }

    public function delete($model)
    {
        $model->delete();

        return true;
    }

    public function select($campo = 'name',$indice = 'id')
    {
        return $this->model->all()->pluck($campo,$indice);

    }
}
