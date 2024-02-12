@extends('layouts.admin')

@section('title','Gestión de clientes')

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
        @can('customers.create')
            <a href="{{route('customers.create')}}" class="nav-link">
                <span class="btn btn-dark btn-rounded">
                    + Cliente
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
                Gestión de clientes
            </h3>
            <nav aria-label="breadcrumb">
                @can('home')
                    <ol class="breadcrumb breadcrumb-custom">
                        <li class="breadcrumb-item"><a href="{{route('home')}}">Inicio</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Cliente</li>
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
                            <th>Teléfono</th>
                            <th>Dirección</th>
                            <th>DNI</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($customers as $customer)
                            <tr>
                                <th scope="row">{{ $customer->id }}</th>
                                <td>{{$customer->name}}</td>
                                <td>{{ $customer->phone }}</td>
                                <td>{{ $customer->adress }}</td>
                                <td>{{ $customer->dni }}</td>
                                <td align="center" style="width:50px;">
                                    {!! Form::open(['route'=>['customers.destroy', $customer], 'method'=>'DELETE']) !!}
                                        @can('customers.show')
                                            <a href="{{route('customers.show', $customer)}}" class="jsgrid-button jsgrid-edit-button"><i class="far fa-eye"></i></a>
                                        @endcan
                                        @can('customers.edit')
                                            <a href="{{route('customers.edit', $customer)}}" class="jsgrid-button jsgrid-edit-button" title="Editar">
                                                <i class="far fa-edit"></i>
                                            </a>
                                        @endcan
                                        @can('customers.destroy')
                                            <button type="submit" class="jsgrid-button jsgrid-delete-button unstyled-button delete-confirm" data-name="{{ $customer->name }}" title="Eliminar">
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