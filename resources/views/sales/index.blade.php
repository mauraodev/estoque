@extends('layouts.app')

@section('content')

<div class="row">
    <div class="col-sm-12 col-md-12 col-lg-12">
        <h1>Vendas</h1>

        <a href="{{ action("SalesController@create") }}" class="btn btn-primary">
            Lançar venda!
        </a>

        <table class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Cliente</th>
                    <th>Valor</th>
                    <th>Data</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

@stop