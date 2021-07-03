<?php

namespace App\Http\Controllers;

use App\Services\CompanyService;
use App\Services\UserService;
use App\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    protected $userService;
    protected $companyService;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(UserService $userService, CompanyService $companyService)
    {
        $this->middleware('auth');

        $this->userService = $userService;
        $this->companyService = $companyService;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('users.index', ['users' => $this->userService->all()]);
    }

    public function create()
    {
        return view('users.create', ['companies' => $this->companyService->all()]);
    }

    public function store(Request $request)
    {
        $user = [
            'name' => $request->post('name'),
            'email' => $request->post('email'),
            'password' => $request->post('password'),
            'company_id' => $request->post('company_id'),
        ];

        $this->userService->create($user);
        
        return redirect('/users');
    }
}
