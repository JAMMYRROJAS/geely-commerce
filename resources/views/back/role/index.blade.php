@extends('layouts.admin')

@section('title','Gestión de roles del sistema')

@section('styles')
    <style type="text/css">
        .unstyled-button {
            border: none;
            padding: 0;
            background: none;
        }

        @media only screen and (min-width:480px) {
            li.no-hidden {
                display: block!important;
            }
        }
    </style>
@endsection

@section('create')
@endsection

@section('preference')
@endsection

@section('content')
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title">
                Roles del sistema
            </h3>
            <nav aria-label="breadcrumb">
                @can('home')
                    <ol class="breadcrumb breadcrumb-custom">
                        <li class="breadcrumb-item"><a href="{{route('home')}}">Inicio</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Roles</li>
                    </ol>
                @endcan
            </nav>
        </div>

        <div class="card">
        <div class="card-body">
            <div class="row">
            <div class="col-12">
                <div class="table-responsive">
                <table id="order-listing" class="table">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Nombre</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($roles as $role)
                            <tr>
                                <th scope="row">{{ $role->id }}</th>
                                <td>
                                    {{ $role->name }}
                                </td>
                                <td align="center" style="width:25px;">
                                    {!! Form::open(['route'=>['roles.edit', $role], 'method'=>'PUT']) !!}
                                        @can('roles.edit')

                                            @if($role-> name != 'Administrador')
                                                <a href="{{route('roles.edit', $role)}}" class="jsgrid-button jsgrid-edit-button" title="Editar">
                                                    <i class="far fa-edit"></i>
                                                </a>
                                            @endif
                                        @endcan

                                        @can('roles.show')
                                            <a href="{{route('roles.show', $role)}}" class="jsgrid-button jsgrid-edit-button"><i class="far fa-eye"></i></a>
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
    </div><!--.content-wrapper-->
@endsection

@section('scripts')
    {!! Html::script('plantilla/js/data-table.js') !!}
@endsection