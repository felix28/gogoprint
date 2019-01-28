<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;

class CRUDRepository implements CRUDRepositoryInterface
{
    private $model;

    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    public function all()
    {
        return $this->model->all();
    }

    public function create(array $data)
    {
        return $this->model->create($data);
    }

    public function show($id)
    {
        return $this->model->find($id);
    }
}
