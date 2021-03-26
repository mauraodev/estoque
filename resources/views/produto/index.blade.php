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
    
    <div class="row">
        <div class="col">
            <a class="btn btn-primary" href="{{ action('ProductsController@create') }}">Adicionar</a>
        </div>
    </div>

    @if (old('nome')):
        <div class="alert alert-success">
            <strong>Sucesso!</strong> O produto {{ old('nome') }} foi adicionado com sucesso!
        </div>
    @endif

    <div class="row">
        <div class="col">
            <table class="table table-striped table-bordered table-hover">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nome</th>
                        <th>Valor</th>
                        <th>Quantidade</th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                @foreach ($produtos as $p)
                    <tr>
                        <td>{{ $p->id }}</td>
                        <td>
                            <a href="{{ action('ProductsController@show', ['id' => $p->id]) }}">
                                {{ $p->name }}
                            </a>
                        </td>
                        <td>{{ $p->value }}</td>
                        <td>{{ $p->amout }}</td>
                        <td>
                            <a class="btn btn-danger" href="{{ action('ProductsController@destroy', ['id' => $p->id]) }}">
                                Excluir
                            </a>
                        </td>
                        <td>
                            <a class="btn btn-info" href="{{ action('ProductsController@edit', ['id' => $p->id]) }}">
                                Editar
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
        </div>
    </div>
    @endif
</div>

@stop
