@extends('layout.principal')

@section('conteudo')

    <h1>Editar Produto</h1>

    <form class="form" action="{{ action('ProdutoController@store') }}" method="POST">
        <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
        <input type="hidden" name="id" value="{{ $p->id }}">
        <div class="form-group">
            <label for="nome">Nome</label>
            <input class="form-control" name="nome" value="{{ $p->nome }}">
        </div>
        <div class="form-group">
            <label for="quantidade">Quantidade</label>
            <input class="form-control" name="quantidade" value="{{ $p->quantidade }}"/>
        </div>
        <div class="form-group">
            <label for="valor">Valor</label>
            <input class="form-control" name="valor" value="{{ $p->valor }}"/>
        </div>
        <div class="form-group">
            <label for="descricao">Descricao</label>
            <textarea class="form-control" name="descricao">{{ $p->descricao }}</textarea>
        </div>
        <button type="submit" class="btn btn-primary btn-block">Submit</button>
    </form>

@stop
