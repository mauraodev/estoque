@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col">
            <h1>Listagem de produtos</h1>

            @if (empty($produtos))
                <div class="alert alert-danger">
                    Você não tem nenhum produto cadastrado.
                </div>
            @else
        </div>
    </div>
    
    <a href="{{ action('ProductsController@novo') }}">Adicionar</a>

    @if (old('nome')):
        <div class="alert alert-success">
            <strong>Sucesso!</strong> O produto {{ old('nome') }} foi adicionado com sucesso!
        </div>
    @endif

        <table class="table table-striped table-bordered table-hover">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nome</th>
                    <th>Valor</th>
                    <th>Quantidade</th>
                    <th>Categoria</th>
                    <th></th>
                    <th></th>
                    <th></th>
                </tr>
            </thead>
            @foreach ($produtos as $p)
                <tr>
                    <td>{{ $p->id }}</td>
                    <td>{{ $p->name }}</td>
                    <td>{{ $p->value }}</td>
                    <td>{{ $p->amout }}</td>
                    <td>{{ $p->category->name }}</td>
                    <td>
                        <a href="/produtos/mostra/{{ $p->id }}">
                            <span class="glyphicon glyphicon-search"></span>
                        </a>
                    </td>
                    <td>
                        <a href="{{ action('ProductsController@remove', ['id' => $p->id]) }}">
                            <span class="glyphicon glyphicon-trash"></span>
                        </a>
                    </td>
                    <td>
                        <a href="{{ action('ProductsController@editar', ['id' => $p->id]) }}">
                            <span class="glyphicon glyphicon-edit"></span>
                        </a>
                    </td>
                </tr>
           @endforeach
        </table>

        <h4>
            <span class="label label-danger pull-right">
                Um ou menos itens no estoque
            </span>
        </h4>
    @endif
</div>

@stop
