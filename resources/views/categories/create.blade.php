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
                    <li class="breadcrumb-item active">
                        <a href="{{ url('/categories') }}">Categorias</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Categoria</li>
                </ol>
            </nav>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-12 col-md-12 col-lg-12">
            <form method="POST" action="{{ action('CategoriesController@store') }}">
                @csrf
                <div class="form-group">
                    <label for="name">Nome</label>
                    <input type="text" class="form-control" name="name" id="name">
                </div>

                <button class="btn btn-primary pull-right">
                    Salvar
                </button>
            </form>
        </div>
    </div>
@endsection
