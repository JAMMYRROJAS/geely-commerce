@extends('layouts.admin')

@section('title','Editar usuario')

@section('styles')
@endsection

@section('options')
@endsection

@section('preference')
@endsection

@section('content')
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title">Editar usuario</h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb breadcrumb-custom">
                    <li class="breadcrumb-item"><a href="{{route('home')}}">Inicio</a></li>
                    @can('users.index')
                        <li class="breadcrumb-item"><a href="{{route('users.index')}}">Usuarios</a></li>
                    @endcan
                    <li class="breadcrumb-item active" aria-current="page">Editar usuario</li>
                </ol>
            </nav>
        </div>
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <h4 class="card-title">Editar usuario</h4>
                        </div>

                        {!! Form::model($user, ['route'=>['users.update', $user], 'method'=>'PUT']) !!}

                            <div class="row">
                                <div class="form-group col-md-6" >
                                    <div id="icon_div">
                                        <label for="name">Nombre</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon3"><i class="fa fa-info-circle"></i></span>
                                            </div>
                                            <input id="name" type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="name" value="{{$user->name}}" required>

                                            @error('name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group col-md-6" >
                                    <div id="icon_div">
                                        <label for="email">Email</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon3"><i class="fa fa-at"></i></span>
                                            </div>
                                            <input id="email" type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="email" value="{{$user->email}}" required>

                                            @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                            

                            @can('users.index')
                                <a href="{{route('users.index')}}" class="btn btn-outline-dark btn-rounded float-right">Cancelar</a>
                            @endcan
                                                
                            <button type="submit" class="btn btn-dark btn-rounded mr-2 float-right">Actualizar</button>
                            
                        {!! Form::close() !!}
                    </div>                
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')

@endsection