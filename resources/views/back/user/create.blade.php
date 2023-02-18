@extends('layouts.admin')

@section('title','Registrar usuario')

@section('styles')
@endsection

@section('options')
@endsection

@section('preference')
@endsection

@section('content')
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title">
                Registro de usuarios
            </h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb breadcrumb-custom">
                    @can('home')
                        <li class="breadcrumb-item"><a href="{{route('home')}}">Dashboard</a></li>
                    @endcan
                    @can('users.index')
                        <li class="breadcrumb-item"><a href="{{route('users.index')}}">Usuarios</a></li>
                    @endcan
                    <li class="breadcrumb-item active" aria-current="page">Registro de usuarios</li>
                </ol>
            </nav>
        </div>
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <h4 class="card-title">Registro de usuarios</h4>
                        </div>

                        {!! Form::open(['route'=>'users.store', 'method'=>'POST']) !!}
                            <div class="form-group" >
                                <div id="icon_div">
                                    <label for="name">Nombre</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon3"><i class="fa fa-info-circle"></i></span>
                                        </div>
                                        <input id="name" type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="name" placeholder="Nombre del usuario" required>

                                        @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="form-group" >
                                <div id="icon_div">
                                    <label for="email">Email</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon3"><i class="fa fa-at"></i></span>
                                        </div>
                                        <input id="email" type="email" name="email" class="form-control @error('email') is-invalid @enderror" placeholder="ejemplo@gmail.com" required>

                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="form-group" >
                                <div id="icon_div">
                                    <label for="password">Contraseña</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon3"><i class="fa fa-key"></i></span>
                                        </div>
                                        <input id="password" type="password" name="password" class="form-control @error('password') is-invalid @enderror" required>

                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            @include('back.user._form')

                            <button type="submit" class="btn btn-primary mr-2">Registrar</button>

                            @can('users.index')
                                <a href="{{route('users.index')}}" class="btn btn-light">Cancelar</a>
                            @endcan
                        {!! Form::close() !!}
                    </div>                
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')

@endsection