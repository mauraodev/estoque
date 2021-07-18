@extends('layouts.app')

@section('content')

<div class="container">    
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Empresas
                </div>
                
                <div class="panel-body">
                    <a href="{{ url('/companies/create') }}" class="btn btn-primary pull-right">Criar</a>

                    <table class="table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nome</th>
                                <th>Editar</th>
                                <th>Excluir</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($items as $item)
                                <tr>
                                    <td>{{ $item->id }}</td>
                                    <td>{{ $item->name }}</td>
                                    <td>
                                        <a href="{{ action('CompaniesController@edit', ['id' => $item->id]) }}" class="btn btn-sm btn-info">Editar</a>
                                    </td>
                                    <td>
                                        <a href="{{ action('CompaniesController@destroy', ['id' => $item->id]) }}" class="btn btn-sm btn-danger">Excluir</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
</div>

@endsection()