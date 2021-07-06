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

    public function before()
    {
        if (!is_null(session('company_id'))) {
            $this->companyId = session('company_id');
        } elseif (isset(Auth::user()->company_id)) {
            $this->companyId = Auth::user()->company_id;
        } else {
            return response()->json(['message' => 'Não foi possível encontrar a empresa'], 200);
        }
    }
    
    public function all()
    {
        $this->before();
        return $this->model->where('company_id', $this->companyId)->get();
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
        $this->before();
        $attributes['company_id'] = $this->companyId;
        return $this->model->create($attributes);
    }

    public function deleteById($id)
    {
        $this->before();
        return $this->model->find($id)->delete();
    }

    public function update($id, $data)
    {
        $item = $this->model->find($id);
        // $item->company_id = Auth::user()->company_id;

        return $item->update($data);
    }
}
