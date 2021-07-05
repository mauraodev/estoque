<?php

namespace App\Http\Middleware;

use App\Services\CompanyService;
use Closure;

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
            return $next($request);
        }
    }
}
