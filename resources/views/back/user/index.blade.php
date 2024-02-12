@extends('layouts.admin')

@section('title','Gestión de usuarios del sistema')

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
    <li class="no-hidden nav-item d-none d-lg-flex">
        @can('users.create')
            <a href="{{route('users.create')}}" class="nav-link">
                <span class="btn btn-dark btn-rounded">
                    + Usuario
                </span>
            </a>
        @endcan
    </li>
@endsection

@section('preference')
@endsection

@section('content')
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title">
                Usuarios del sistema
            </h3>
            <nav aria-label="breadcrumb">
                @can('home')
                    <ol class="breadcrumb breadcrumb-custom">
                        <li class="breadcrumb-item"><a href="{{route('home')}}">Inicio</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Usuarios</li>
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
                            <th>Email</th>
                            <th style="text-align: center" >Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            <tr>
                                <th scope="row">{{ $user->id }}</th>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td align="center" style="width:150px;">
                                    {!! Form::open(['route'=>['users.destroy', $user], 'method'=>'DELETE']) !!}
                                        @can('users.show')
                                            <a href="{{route('users.show', $user)}}" class="jsgrid-button jsgrid-edit-button"><i class="far fa-eye"></i></a>
                                        @endcan

                                        @can('users.edit')
                                            <a href="{{route('users.edit', $user)}}" class="jsgrid-button jsgrid-edit-button"><i class="far fa-edit"></i></a>
                                        @endcan

                                        @can('users.destroy')
                                            @if($user->id > 1)
                                                <button type="submit" class="jsgrid-button jsgrid-delete-button unstyled-button delete-confirm" data-name="{{ $user->name }}" title="Eliminar"><i class="far fa-trash-alt"></i>
                                                </button>
                                            @endif                                           
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

    <script>
        $('.delete-confirm').click(function(event) {
            var form =  $(this).closest("form");
            var name = $(this).data("name");
            event.preventDefault();
            swal({
                title: `¿Estás seguro de que quieres eliminar ${name}?`,
                text: "Si hace esto, desaparecerá para siempre",
                icon: "warning",
                buttons: true,
                buttons: ["Cancelar", "¡Sí!"],
                dangerMode: true,
            })
            .then((willDelete) => {
            if (willDelete) {
                form.submit();
            }
            });
        });
    </script>
@endsection