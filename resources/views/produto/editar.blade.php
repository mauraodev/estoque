@extends('layouts.app')

@section('content')

    <h1>Editar Produto</h1>

    <form class="form" action="{{ action('ProductsController@update', ['id' => $p->id]) }}" method="POST">
        <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
        <input type="hidden" name="id" value="{{ $p->id }}">
        <div class="form-group">
            <label for="name">Nome</label>
            <input class="form-control" name="name" value="{{ $p->name }}">
        </div>
        <div class="form-group">
            <label for="amout">Quantidade</label>
            <input class="form-control" name="amout" value="{{ $p->amout }}"/>
        </div>
        <div class="form-group">
            <label for="value">Valor</label>
            <input class="form-control" name="value" value="{{ $p->value }}"/>
        </div>
        <div class="form-group">
            <label for="description">Descricao</label>
            <textarea class="form-control" name="description">{{ $p->description }}</textarea>
        </div>
        <div class="form-group">
            <label for="size">Tamanho</label>
            <input name="size" class="form-control" value="{{ $p->size }}" />    
        </div>
        <button type="submit" class="btn btn-primary btn-block">Salvar</button>
    </form>

@stop
