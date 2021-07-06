<?php

namespace App\Http\Middleware;

use App\Services\CompanyService;
use Closure;
use Illuminate\Support\Facades\Session;

class CompanyToken
{
    protected $companyService;

    public function __construct(CompanyService $companyService)
    {
        $this->companyService = $companyService;
    }

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $authorization = $request->header('Authorization');
        list($berer, $token) = explode(' ', $authorization);

        $company = $this->companyService->findByToken($token);

        if ($company) {
            Session::put('company_id', $company[0]->id);
            Session::save();

            return $next($request);
        }
    }
}
