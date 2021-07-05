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

        if (empty($produto)) {
            return "Esse produto não existe";
        }

        return view('produto.detalhes')->with('p', $produto);
    }

    public function create()
    {
        return view('produto.formulario', ['categories' => $this->category->all()]);
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

        $this->productRepository->create($data);

        return redirect()
            ->action('ProductsController@index')
            ->withInput(['nome' => $request->input('nome')]);
    }

    public function destroy($id)
    {
        $this->productRepository->deleteById($id);

        return redirect()
            ->action('ProductsController@index');
    }

    public function edit($id)
    {
        $produto = $this->productRepository->find($id);
        return view('produto.editar', ['p' => $produto]);
    }

    public function update(Request $request)
    {
        $data = $request->all();

        $this->productRepository->update($request->post('id'), $data);

        return redirect()
            ->action('ProductsController@index');
    }
}
