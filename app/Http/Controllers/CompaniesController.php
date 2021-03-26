<?php

namespace App\Http\Controllers;

use App\Repositories\CompanyRepository;
use Illuminate\Http\Request;

class CompaniesController extends Controller
{
    protected $companyRepository;

    public function __construct(CompanyRepository $companyRepository)
    {
        $this->companyRepository = $companyRepository;
    }

    public function index()
    {
        $items = $this->companyRepository->all();

        return view('companies.index', ['items' => $items]);
    }

    public function create()
    {
        return view('companies.create');
    }

    public function store(Request $request)
    {
        $data = [
            'name' => $request->post('name')
        ];

        $this->companyRepository->create($data);

        return redirect()
            ->action('CompaniesController@index');
    }
}
