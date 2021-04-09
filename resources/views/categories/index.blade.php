@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-sm-12 col-md-12 col-lg-12">
            <h2>Categorias</h2>

            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item active">
                        <a href="{{ url('/home') }}">Home</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Categorias</li>
                </ol>
            </nav>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-12 col-md-12 col-lg-12">
            <a href="{{ url('categories/create') }}" class="btn btn-primary pull-right">
                Adicionar
            </a>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-12 col-md-12 col-lg-12">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nome</th>
                        <th scope="col"></th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    @if ($categories)
                        @foreach ($categories as $category)
                            <tr>
                                <td>{{ $category->id }}</td>
                                <td>{{ $category->name }}</td>
                                <td>
                                    <a class="btn btn-info"
                                        href={{ action('CategoriesController@edit', ['id' => $category->id]) }}>
                                        Editar
                                    </a>
                                </td>
                                <td>
                                    <a class="btn btn-danger"
                                        href="{{ action('CategoriesController@delete', ['id' => $category->id]) }}">
                                        Excluir
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    @endif
                </tbody>
            </table>
        </div>
    </div>
@endsection
