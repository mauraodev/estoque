<?php

namespace estoque\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class ProdutoController extends Controller
{
    public function lista()
    {
        $produtos = DB::select('select * from produtos');

        return view('produto.listagem')->withProdutos($produtos);
    }

    public function mostra($id)
    {
        $produto = DB::select('select * from produtos where id = ?', [$id]);

        if (empty($produto)) {
            return "Esse produto não existe";
        }

        return view('produto.detalhes')->with('p', $produto[0]);
    }

    public function novo()
    {
        return view('produto.formulario');
    }

    public function adiciona(Request $request)
    {
        $nome = $request->input('nome');
        $descricao = $request->input("descricao");
        $valor = $request->input("valor");
        $quantidade = $request->input("quantidade");

        DB::insert('insert into produtos values (null, ?, ?, ?, ?, null, null)', array($nome, $valor, $descricao, $quantidade));

        return redirect('/produtos')->withInput($request->input('nome'));
    }

    public function json()
    {
        $produtos = DB::select('select * from produtos');
        return $produtos;
    }
}
