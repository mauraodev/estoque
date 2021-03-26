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
                <li><a href="{{ url('/')}}">Home</a></li>
                <li><a href="{{ url('/companies') }}">Empresas</a></li>
                <li><a href="#">Cadastro</a></li>
            </ol>
        </div>
    </div>

    <div class="row">
        <div class="col">
            <form class="form" action="{{ action('CompaniesController@store') }}" method="POST">
                <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
                <div class="form-group">
                    <label for="name">Nome</label>
                    <input type="text" class="form-control" name="name">
                </div>

                <div class="form-group">
                    <button class="btn btn-primary" type="submit">Salvar</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection()