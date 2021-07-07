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
                <li><a href="#">Edição</a></li>
            </ol>
        </div>
    </div>

    <div class="row">
        <div class="col">
            <form class="form" action="{{ action('CompaniesController@update', ['id' => $item->id]) }}" method="POST">
                {{ method_field('PATCH') }}
                <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />

                <div class="form-group">
                    <label for="name">Nome</label>
                    <input type="text" class="form-control" name="name" value="{{ old('name', $item->name) }}">
                </div>

                <div class="form-group">
                    <label for="api_token">Token</label>
                    <input type="text" class="form-control" name="api_token" value="{{ old('api_token', $item->api_token) }}">
                </div>

                <div class="form-group">
                    <button class="btn btn-primary" type="submit">Salvar</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection()