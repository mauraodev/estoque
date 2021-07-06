<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\ProdutosRequest;
use App\Repositories\CategoryRepository;
use App\Repositories\ProductRepository;

class ProductsController extends Controller
{
    protected $product;
    protected $productRepository;
    protected $category;

    public function __construct(CategoryRepository $category, ProductRepository $productRepository)
    {
        $this->category = $category;
        $this->productRepository = $productRepository;
    }

    public function index()
    {
        $produtos = $this->productRepository->all();
        return response()->json($produtos, 200);
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
