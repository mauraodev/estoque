@extends('layout.principal')

@section('conteudo')

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

    <form class="form" action="/produtos/adiciona" method="POST">
        <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
        <div class="form-group">
            <label for="nome">Nome</label>
            <input class="form-control" name="nome" value="{{ old('nome') }}" />
        </div>
        <div class="form-group">
            <label for="quantidade">Quantidade</label>
            <input class="form-control" name="quantidade" value="{{ old('quantidade') }}" />
        </div>
        <div class="form-group">
            <label for="valor">Valor</label>
            <input class="form-control" name="valor" value="{{ old('valor') }}" />
        </div>
        <div class="form-group">
            <label for="descricao">Descricao</label>
            <textarea class="form-control" name="descricao"></textarea>
        </div>
        <div class="form-group">
            <label>Tamanho</label>
            <input name="tamanho" class="form-control" />    
        </div>
        <div class="form-group">
            <label>Categoria</label>
            <select name="categoria_id" class="form-control">
                @foreach($categorias as $c)
                <option value="{{$c->id}}">{{$c->nome}}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary btn-block">Submit</button>
    </form>

@stop
