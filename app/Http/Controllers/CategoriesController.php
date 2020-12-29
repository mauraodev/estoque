<?php

namespace App\Http\Controllers;

use App\Repositories\CategoryRepository;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    protected $categoryRepository;

    public function __construct(CategoryRepository $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }

    public function index()
    {
        $categories = $this->categoryRepository->all();

        return view('categories.index', ['categories' => $categories]);
    }

    public function create()
    {
        return view('categories.create');
    }

    public function store(Request $request)
    {
        $data = [
            'name' => $request->post('name')
        ];

        $this->categoryRepository->create($data);

        return redirect('/categories');
    }

    public function edit($id)
    {
        $category = $this->categoryRepository->find($id);
        return view('categories.edit', ['category' => $category]);
    }

    public function update(Request $request)
    {
        $category = $this->categoryRepository->find($request->input('id'));

        $category->name = $request->input('name');
        $category->save();

        return redirect('/categories');
    }

    public function delete($id)
    {
        $this->categoryRepository->deleteById($id);
        
        return redirect('/categories');
    }
}
