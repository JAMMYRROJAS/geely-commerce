@extends('layouts.admin')

@section('title', 'Editar rol')

@section('styles')
@endsection

@section('options')
@endsection

@section('preference')
@endsection

@section('content')
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title">Modificar permisos del rol {{$role->name}}</h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb breadcrumb-custom">
                    @can('home')
                        <li class="breadcrumb-item"><a href="{{route('home')}}">Dashboard</a></li>
                    @endcan
                    @can('roles.index')
                        <li class="breadcrumb-item"><a href="{{route('roles.index')}}">Roles</a></li>
                    @endcan
                    <li class="breadcrumb-item active" aria-current="page">Editar rol</li>
                </ol>
            </nav>
        </div>
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        {!! Form::model($role, ['route'=>['roles.update', $role], 'method'=>'PUT']) !!}

                            @include('back.role._form')
                                                
                            <button type="submit" class="btn btn-primary mr-2">Actualizar</button>
                            @can('roles.index')
                                <a href="{{route('roles.index')}}" class="btn btn-light">Cancelar</a>
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