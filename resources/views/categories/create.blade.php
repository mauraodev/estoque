@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-12">
            <h1>Categorias</h1>

            <ul class="breadcrumb">
                <li>Home</li>
                <li>Categorias</li>
            </ul>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <form method="POST" action="{{ action('CategoriesController@store')}}">
                @csrf
                <div class="form-group">
                    <label for="name">Nome</label>
                    <input type="text" class="form-control" name="name" id="name">
                </div>

                <button class="btn btn-primary">
                    Enviar
                </button>
           </form>
        </div>
    </div>
@endsection