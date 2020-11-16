<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ProdutosRequest;
use App\Models\Product;
use App\Repositories\CategoryRepository;

class ProductsController extends Controller
{
    protected $product;
    protected $category;

    public function __construct(Product $product, CategoryRepository $category)
    {
        $this->middleware('auth')->only('index');
        $this->product = $product;
        $this->category = $category;
    }

    public function index()
    {
        $produtos = $this->product->all();
        return view('produto.index', ['produtos' => $produtos]);
    }

    public function show($id)
    {
        $produto = $this->product->find($id);

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
        $params = $request->all();
        $this->product->create($params);

        return redirect()
            ->action('ProductsController@index')
            ->withInput(['nome' => $request->input('nome')]);
    }

    public function destroy($id)
    {
        $produto = $this->product->find($id);
        $produto->delete();

        return redirect()
            ->action('ProductsController@index');
    }

    public function edit($id)
    {
        $produto = $this->product->find($id);
        return view('produto.editar', ['p' => $produto]);
    }

    public function update(Request $request)
    {
        info("Here!");
        $produto = $this->product->find($request->input('id'));
        
        $produto->name = $request->input('name');
        $produto->amout = $request->input('amout');
        $produto->value = $request->input('value');
        $produto->description = $request->input('description');
        $produto->size = $request->input('size');
        $produto->save();

        return redirect()
            ->action('ProductsController@index');
    }
}
