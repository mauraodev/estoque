<?php

namespace App\Repositories;

use App\User;

class UserRepository extends BaseRepository
{
    protected $model;

    public function __construct(User $model)
    {
        parent::__construct($model);
    }

    public function all()
    {
        return $this->model->all();
    }
}
