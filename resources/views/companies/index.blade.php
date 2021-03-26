@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col">
            <h1>Empresas</h1>
        </div>
    </div>

    <div class="row">
        <div class="col">
            <ol class="breadcrumb">
                <li>Home</li>
                <li>Empresas</li>
            </ol>
        </div>
    </div>

    <div class="row">
        <div class="col">
            <a href="{{ url('/companies/create') }}" class="btn btn-primary">Adicionar</a>
        </div>
    </div>

    <div class="row">
        <div class="col">
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
                            <td><a href="{{ url('/companies', $item->id) }}" class="btn btn-info">Editar</a></td>
                            <td><a href="{{ url('/companies', $item->id) }}" class="btn btn-danger">Excluir</a></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection()