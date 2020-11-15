@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-12">
            <a href="{{ url('categories/create') }}" class="btn btn-primary">
                Adicionar
            </a>

            <table class="table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nome</th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @if ($categories)
                        @foreach ($categories as $category)                        
                            <tr>
                                <td>{{ $category->id }}</td>
                                <td>{{ $category->name }}</td>
                                <td><button class="btn">Editar</button></td>
                                <td>
                                    <a class="btn btn-danger" href="{{ action('CategoriesController@delete', ['id' => $category->id])}}">
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