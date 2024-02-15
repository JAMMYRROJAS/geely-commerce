@extends('layouts.admin')

@section('title','Gestión de proveedores')

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
        @can('suppliers.create')
            <a href="{{route('suppliers.create')}}" class="nav-link">
                <span class="btn btn-dark btn-rounded">
                    + Proveedor
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
                Proveedores
            </h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb breadcrumb-custom">
                    <li class="breadcrumb-item"><a href="{{route('home')}}">Inicio</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Proveedores</li>
                </ol>
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
                            <th>Lugar de origen</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($suppliers as $supplier)
                            <tr>
                                <th scope="row">{{ $supplier->id }}</th>
                                <td>{{$supplier->name}}</td>
                                <td>{{ $supplier->place_origin }}</td>
                                <td align="center" style="width:50px;">
                                    {!! Form::open(['route'=>['suppliers.destroy', $supplier], 'method'=>'DELETE']) !!}
                                        @can('suppliers.show')
                                            <a href="{{route('suppliers.show',$supplier)}}" class="jsgrid-button jsgrid-edit-button"><i class="far fa-eye"></i></a>
                                        @endcan

                                        @can('suppliers.edit')
                                            <a href="{{route('suppliers.edit', $supplier)}}" class="jsgrid-button jsgrid-edit-button" title="Editar">
                                                <i class="far fa-edit"></i>
                                            </a>
                                        @endcan

                                        @can('suppliers.destroy')
                                            <button type="submit" class="jsgrid-button jsgrid-delete-button unstyled-button delete-confirm" data-name="{{ $supplier->name }}" title="Eliminar">
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