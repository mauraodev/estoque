<?php

namespace App\Services;

use App\Repositories\BaseRepository;
use Illuminate\Database\Eloquent\Model;

class BaseService
{
    protected $repository;

    public function __construct(BaseRepository $repository)
    {
        $this->repository = $repository;
    }

    public function all()
    {
        return $this->repository->all();
    }

    public function create(array $attributes): Model
    {
        return $this->repository->create($attributes);
    }

    public function find($id)
    {
        return $this->repository->find($id);
    }
}
