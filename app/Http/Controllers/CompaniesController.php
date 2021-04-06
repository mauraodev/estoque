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
        $items = $this->companyRepository->allWithOutCompany();

        return view('companies.index', ['items' => $items]);
    }

    public function show($id)
    {
        dd($id);
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

    public function edit($id)
    {
        $item = $this->companyRepository->find($id);

        return view('companies.edit', ['item' => $item]);
    }

    public function update(Request $request, $id)
    {
        $item = $this->companyRepository->find($id);

        $item->name = $request->post('name');
        $item->save();

        return redirect()
            ->action('CompaniesController@index');
    }

    public function destroy($id)
    {
        $item = $this->companyRepository->find($id);
        $item->delete();

        return redirect()
            ->action('CompaniesController@index');
    }
}
