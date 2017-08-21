@extends('layout.principal')

@section('conteudo')

    <h1>Novo Produto</h1>

    <form class="form" action="/produtos/adiciona" method="POST">
        <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
        <div class="form-group">
            <label for="nome">Nome</label>
            <input class="form-control" name="nome"></input>
        </div>
        <div class="form-group">
            <label for="quantidade">Quantidade</label>
            <input class="form-control" name="quantidade"></input>
        </div>
        <div class="form-group">
            <label for="valor">Valor</label>
            <input class="form-control" name="valor"></input>
        </div>
        <div class="form-group">
            <label for="descricao">Descricao</label>
            <textarea class="form-control" name="descricao"></textarea>
        </div>
        <button type="submit" class="btn btn-primary btn-block">Submit</button>
    </form>

@stop
