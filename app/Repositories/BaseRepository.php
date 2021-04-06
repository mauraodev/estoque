<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class BaseRepository
{
    protected $model;
    protected $companyId;

    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    public function all()
    {
        return $this->model->where('company_id', Auth::user()->id)->get();
    }

    public function allWithOutCompany()
    {
        return $this->model->all();
    }

    public function find($id)
    {
        return $this->model->find($id);
    }

    public function create(array $attributes): Model
    {
        return $this->model->create($attributes);
    }

    public function deleteById($id)
    {
        return $this->find($id)->delete();
    }
}
