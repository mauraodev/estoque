<?php

namespace App\Services;

use App\Repositories\CompanyRepository;

class CompanyService
{
    protected $userRepository;

    public function __construct(CompanyRepository $companyRepository)
    {
        $this->companyRepository = $companyRepository;
    }

    public function all()
    {
        return $this->companyRepository->all();
    }

    public function findByToken($token)
    {
        return $this->companyRepository->findByToken($token);
    }
}
