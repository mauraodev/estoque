<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
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
        $produto = $this->productRepository->find($id);
        return response()->json($produto, 200);
    }

    public function store(ProdutosRequest $request)
    {
        $data = [
            'name' => $request->post('name'),
            'description' => $request->post('description'),
            'value' => str_replace(',', '.', $request->post('value')),
            'amout' => $request->post('amout'),
            'size' => $request->post('size'),
            'category_id' => $request->post('category_id'),
        ];

        $product = $this->productRepository->create($data);

        return response()->json($product, 200);
    }

    public function destroy($id)
    {
        $this->productRepository->deleteById($id);

        return response()->json(['message' => 'Produto excluído com sucesso'], 200);
    }

    public function update($id, Request $request)
    {
        $data = $request->all();

        $product = $this->productRepository->update($id, $data);

        return response()->json($product, 200);
    }
}
