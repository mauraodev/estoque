<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Http\Requests\ProdutosRequest;
use App\Models\Product;
use App\Repositories\CategoryRepository;
use Validator;

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
        //dd($produtos);
        return view('produto.index', ['produtos' => $produtos]);
    }

    public function mostra($id)
    {
        $produto = $this->product->find($id);

        if (empty($produto)) {
            return "Esse produto não existe";
        }

        return view('produto.detalhes')->with('p', $produto);
    }

    public function novo()
    {
        info($this->category->all());

        return view('produto.formulario', ['categories' => $this->category->all()]);
    }

    public function adiciona(ProdutosRequest $request)
    {
        $params = $request->all();
        $this->product->create($params);

        return redirect()
            ->action('ProductsController@index')
            ->withInput(['nome' => $request->input('nome')]);
    }

    public function json()
    {
        $produtos = $this->product->all();
        return $produtos;
    }

    public function remove($id)
    {
        $produto = $this->product->find($id);
        $produto->delete();

        return redirect()
            ->action('ProductsController@lista');
    }

    public function editar($id)
    {
        $produto = $this->product->find($id);
        return view('produto.editar', ['p' => $produto]);
    }

    public function store(Request $request)
    {
        $produto = $this->product->find($request->input('id'));
        $produto->nome = $request->input('nome');
        $produto->quantidade = $request->input('quantidade');
        $produto->valor = $request->input('valor');
        $produto->descricao = $request->input('descricao');
        $produto->tamanho = $request->input('tamanho');
        $produto->save();

        return redirect()
            ->action('ProductsController@lista');
    }
}
