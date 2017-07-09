@extends('layout.principal')

@section('conteudo')

    <form class="form">
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
    </form>

@stop
