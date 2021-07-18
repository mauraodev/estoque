@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Usuários</div>

                    <div class="panel-body">
                        
                        @if (count($errors) > 0)
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                    
                        <form class="form" action="{{ action('UsersController@store') }}" method="POST">
                            <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
                            
                            <div class="form-group">
                                <label for="name">Nome</label>
                                <input class="form-control" name="name" value="{{ old('name') }}" />
                            </div>

                            <div class="form-group">
                                <label for="amout">Email</label>
                                <input class="form-control" name="email" value="{{ old('email') }}" />
                            </div>

                            <div class="form-group">
                                <label for="value">Senha</label>
                                <input class="form-control" name="password" value="{{ old('password') }}" />
                            </div>

                            <div class="form-group">
                                <label>Empresa</label>
                                <select name="company_id" class="form-control">
                                    <option value="">Selecione</option>
                                    @foreach($companies as $company)
                                        <option value="{{$company->id}}">
                                            {{$company->name}}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <button type="submit" class="btn btn-primary pull-right">
                                Salvar
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
