<?php

namespace App\Repositories;

use App\Company;

class CompanyRepository extends BaseRepository
{
    protected $model;
    
    public function __construct(Company $model)
    {
        parent::__construct($model);
    }

    public function all()
    {
        return $this->model->all();
    }

    public function findByToken($token)
    {
        return $this->model->where('api_token', $token)
            ->get();
    }
}
