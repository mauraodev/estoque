@extends('layouts.app')

@section('content')

<div class="container">
    <h1>Listagem de produtos</h1>
    @if (empty($produtos))
        <div class="alert alert-danger">
            Você não tem nenhum produto cadastrado.
        </div>
    @else
    
        @if (old('nome')):
            <div class="alert alert-success">
                <strong>Sucesso!</strong> O produto {{ old('nome') }} foi adicionado com sucesso!
            </div>
        @endif

        <table class="table table-striped table-bordered table-hover">
            @foreach ($produtos as $p)
                <tr class="{{ $p->quantidade <= 1 ? 'danger' : ''}}">
                    <td>{{ $p->nome }}</td>
                    <td>{{ $p->valor }}</td>
                    <td>{{ $p->descricao }}</td>
                    <td>{{ $p->quantidade }}</td>
                    <td>{{ $p->tamanho }}</td>
                    <td>{{ $p->categoria->nome }}</td>
                    <td>
                        <a href="/produtos/mostra/{{ $p->id }}">
                            <span class="glyphicon glyphicon-search"></span>
                        </a>
                    </td>
                    <td>
                        <a href="{{ action('ProdutoController@remove', ['id' => $p->id]) }}">
                            <span class="glyphicon glyphicon-trash"></span>
                        </a>
                    </td>
                    <td>
                        <a href="{{ action('ProdutoController@editar', ['id' => $p->id]) }}">
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