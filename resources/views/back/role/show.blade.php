@extends('layouts.admin')

@section('title','Información sobre el rol')

@section('styles')
    <style type="text/css">
        .unstyled-button {
            border: none;
            padding: 0;
            background: none;
        }
    </style>
@endsection

@section('create')

@endsection

@section('content')
<div class="content-wrapper">
    <div class="page-header">
        <h3 class="page-title">
            Detalles del rol {{$role->name}}
        </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb breadcrumb-custom">
                @can('home')
                    <li class="breadcrumb-item"><a href="{{route('home')}}">Inicio</a></li>
                @endcan
                @can('roles.index')
                    <li class="breadcrumb-item"><a href="{{route('roles.index')}}">Roles</a></li>
                @endcan
                <li class="breadcrumb-item active" aria-current="page">{{$role->name}}</li>
            </ol>
        </nav>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="border-bottom text-center pb-4">
                                <h3>Rol {{$role->name}}</h3>
                                <div class="d-flex justify-content-between">
                                </div>
                            </div>
                            <div class="border-bottom py-4">
                                <div class="list-group">
                                    <a class="list-group-item list-group-item-action active" id="list-home-list" data-toggle="list" href="#list-home" role="tab" aria-controls="home">
                                        Permisos
                                    </a>
                                    <a type="button" class="list-group-item list-group-item-action" id="list-profile-list" data-toggle="list" href="#list-profile" role="tab" aria-controls="profile">Usuarios</a>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-8 pl-lg-5">
                            <div class="tab-content" id="nav-tabContent">
                                <div class="tab-pane fade show active" id="list-home" role="tabpanel" aria-labelledby="list-home-list">
                                    <div class="d-flex justify-content-between">
                                        <div>
                                            <h4>Permisos asignados al rol {{$role->name}}</h4>
                                        </div>
                                    </div>
                                    <div class="profile-feed">
                                        <div class="d-flex align-items-start profile-feed-item">
                                            <div class="table-responsive">
                                                <table id="order-listing" class="table">
                                                    <thead>
                                                        <tr>
                                                            <th>Id</th>
                                                            <th>Nombre</th>
                                                            <th>Descripción</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($role->permissions as $permission)
                                                        <tr>
                                                            <th scope="row">{{$permission->id}}</th>
                                                            <td>{{$permission->name}}</td>
                                                            <td>{{$permission->description}}</td>
                                                        </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>

                                        </div>
                                    </div>
                                </div>

                                <div class="tab-pane fade" id="list-profile" role="tabpanel" aria-labelledby="list-profile-list">
                                    <div class="d-flex justify-content-between">
                                        <div>
                                            <h4>Usuarios con el rol {{$role->name}}</h4>
                                        </div>
                                    </div>
                                    <div class="profile-feed">
                                        <div class="d-flex align-items-start profile-feed-item">
    
                                            <div class="table-responsive">
                                                <table id="order-listing1" class="table">
                                                    <thead>
                                                        <tr>
                                                            <th>Id</th>
                                                            <th>Nombre</th>
                                                            <th>Correo electrónico</th>
                                                            <th>Acciones</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($role->users as $user)
                                                        <tr>
                                                            <th scope="row">{{$user->id}}</th>
                                                            <td>
                                                                <a href="{{route('users.show',$user)}}">{{$user->name}}</a>
                                                            </td>
                                                            <td>{{$user->email}}</td>
                                                            <td align="center" style="width: 50px;">
                                                                {!! Form::open(['route'=>['users.destroy',$user], 'method'=>'DELETE']) !!}                        
                                                                @can('users.edit')
                                                                    <a class="jsgrid-button jsgrid-edit-button" href="{{route('users.edit', $user)}}" title="Editar">
                                                                        <i class="far fa-edit"></i>
                                                                    </a>
                                                                @endcan
                                                                @can('users.destroy')
                                                                    <button class="jsgrid-button jsgrid-delete-button unstyled-button" type="submit" title="Eliminar">
                                                                        <i class="far fa-trash-alt"></i>
                                                                    </button>
                                                                @endcan
                                                                {!! Form::close() !!}
                                                            </td>
                                                        </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
    
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer text-muted">
                    @can('roles.index')
                        <a href="{{route('roles.index')}}" class="btn btn-outline-dark btn-rounded float-right">Regresar</a>
                    @endcan
                </div>
            </div>
        </div>
    </div>

</div>
@endsection
@section('scripts')
    {!! Html::script('melody/js/profile-demo.js') !!}
    {!! Html::script('melody/js/data-table.js') !!}
@endsection
