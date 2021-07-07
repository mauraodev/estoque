<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use Illuminate\Http\Request;
use App\Http\Requests\ProdutosRequest;
use App\Repositories\CategoryRepository;

class CategoriesController extends Controller
{
    protected $categoryRepository;

    public function __construct(CategoryRepository $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }

    public function index()
    {
        return response()->json($this->categoryRepository->all(), 200);
    }

    public function show($id)
    {
        return response()->json($this->categoryRepository->find($id), 200);
    }

    public function store(CategoryRequest $request)
    {
        $data = [
            'name' => $request->post('name')
        ];

        return response()->json($this->categoryRepository->create($data), 200);
    }

    public function destroy($id)
    {
        $this->categoryRepository->deleteById($id);

        return response()->json(['message' => 'Categoria excluída com sucesso'], 200);
    }

    public function update($id, CategoryRequest $request)
    {
        $data = $request->all();

        $product = $this->categoryRepository->update($id, $data);

        return response()->json($product, 200);
    }
}
