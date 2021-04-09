@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-sm-12 col-md-12 col-lg-12">
            <h1>Novo Produto</h1>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-12 col-md-12 col-lg-12">
            <ul class="breadcrumb">
                <li><a href="{{ url('/home') }}">Home</a></li>
                <li><a href="{{ url('products') }}">Produtos</a></li>
                <li>Novo Produto</li>
            </ul>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-12 col-md-12 col-lg-12">
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
                <textarea class="form-control" name="description">{{ old('description') }}</textarea>
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
            <button type="submit" class="btn btn-primary pull-right">Salvar</button>
        </form>
        </div>
    </div>
@stop
