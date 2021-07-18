<?php

namespace App\Services;

use App\Repositories\UserRepository;
use App\User;

class UserService
{
    protected $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function all()
    {
        return $this->userRepository->all();
    }

    public function create(array $attributes): User
    {
        return $this->userRepository->create($attributes);
    }

    public function find($id)
    {
        return $this->userRepository->find($id);
    }
}
