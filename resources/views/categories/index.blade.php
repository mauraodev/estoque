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
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
@endsection