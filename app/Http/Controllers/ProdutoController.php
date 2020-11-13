<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Produto;
use App\Categoria;
use App\Http\Requests\ProdutosRequest;
use Validator;

class ProdutoController extends Controller
{
    protected $product;

    public function __construct(Produto $product)
    {
        $this->middleware('auth')->only('index');
        $this->product = $product;
    }

    public function index()
    {
        $produtos = $this->product->all();
        return view('produto.index', ['produtos' => $produtos]);
    }

    public function mostra($id)
    {
        $produto = Produto::find($id);

        if (empty($produto)) {
            return "Esse produto não existe";
        }

        return view('produto.detalhes')->with('p', $produto);
    }

    public function novo()
    {
        return view('produto.formulario', ['categorias' => Categoria::all()]);
    }

    public function adiciona(ProdutosRequest $request)
    {
        $params = $request->all();
        Produto::create($params);

        return redirect()
            ->action('ProdutoController@lista')
            ->withInput(['nome' => $request->input('nome')]);
    }

    public function json()
    {
        $produtos = Produto::all();
        return $produtos;
    }

    public function remove($id)
    {
        $produto = Produto::find($id);
        $produto->delete();

        return redirect()
            ->action('ProdutoController@lista');
    }

    public function editar($id)
    {
        $produto = Produto::find($id);
        return view('produto.editar', ['p' => $produto]);
    }

    public function store(Request $request)
    {
        $produto = Produto::find($request->input('id'));
        $produto->nome = $request->input('nome');
        $produto->quantidade = $request->input('quantidade');
        $produto->valor = $request->input('valor');
        $produto->descricao = $request->input('descricao');
        $produto->tamanho = $request->input('tamanho');
        $produto->save();

        return redirect()
            ->action('ProdutoController@lista');
    }
}
