@extends('layouts.app')

@section('content')

    <h1>Novo Produto</h1>

    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form class="form" action="{{ action('ProductsController@store') }}" method="POST">
        <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
        <div class="form-group">
            <label for="name">Nome</label>
            <input class="form-control" name="name" value="{{ old('name') }}" />
        </div>
        <div class="form-group">
            <label for="amout">Quantidade</label>
            <input class="form-control" name="amout" value="{{ old('amout') }}" />
        </div>
        <div class="form-group">
            <label for="value">Valor</label>
            <input class="form-control" name="value" value="{{ old('value') }}" />
        </div>
        <div class="form-group">
            <label for="description">Descricao</label>
            <textarea class="form-control" name="description"></textarea>
        </div>
        <div class="form-group">
            <label>Tamanho</label>
            <input name="size" class="form-control" />    
        </div>
        <div class="form-group">
            <label>Categoria</label>
            <select name="category_id" class="form-control">
                <option value="">Selecione</option>
                @foreach($categories as $c)
                    <option value="{{$c->id}}">{{$c->name}}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary btn-block">Salvar</button>
    </form>

@stop
