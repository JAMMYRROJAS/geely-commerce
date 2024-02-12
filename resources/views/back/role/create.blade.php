@extends('layouts.admin')

@section('title','Registrar rol')

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
                Registro de roles
            </h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb breadcrumb-custom">
                    @can('home')
                        <li class="breadcrumb-item"><a href="{{route('home')}}">Inicio</a></li>
                    @endcan
                    @can('roles.index')
                        <li class="breadcrumb-item"><a href="{{route('roles.index')}}">Rol</a></li>
                    @endcan
                    <li class="breadcrumb-item active" aria-current="page">Registro de rol</li>
                </ol>
            </nav>
        </div>
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <h4 class="card-title">Registro de Rol</h4>
                        </div>

                        {!! Form::open(['route'=>'roles.store', 'method'=>'POST']) !!}
                            <div class="form-group">
                                <label for="name">Nombre</label>
                                <input type="text"
                                    class="form-control" name="name" id="name" aria-describedby="helpId" placeholder="Nombre del rol">
                            </div>

                            @include('back.role._form')
                            
                            <button type="submit" class="btn btn-dark btn-rounded mr-2">Registrar</button>
                            @can('roles.index')
                                <a href="{{route('roles.index')}}" class="btn btn-outline-dark btn-rounded">Cancelar</a>
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