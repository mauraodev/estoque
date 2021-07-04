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
                    
                        <form class="form" action="{{ action('UsersController@update', ['id' => $user->id]) }}" method="POST">
                            <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
                            
                            <div class="form-group">
                                <label for="name">Nome</label>
                                <input class="form-control" name="name" value="{{ old('name', $user->name)  }}" />
                            </div>

                            <div class="form-group">
                                <label for="email">Email</label>
                                <input class="form-control" name="email" value="{{ old('email', $user->email) }}" />
                            </div>

                            <div class="form-group">
                                <label for="password">Senha</label>
                                <input class="form-control" name="password" value="" />
                            </div>

                            <div class="form-group">
                                <label>Empresa</label>
                                <select name="company_id" class="form-control">
                                    <option value="">Selecione</option>
                                    @foreach($companies as $company)
                                        <option value="{{$company->id}}" {{ $user->company_id == $company->id ? 'selected' : ''}}>
                                            {{$company->name}}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            
                            <button type="submit" class="btn btn-primary pull-right">
                                Salvar
                            </button>

                            <a class="btn btn-default pull-right" href="{{ action('UsersController@index') }}">
                                Cancelar
                            </a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
