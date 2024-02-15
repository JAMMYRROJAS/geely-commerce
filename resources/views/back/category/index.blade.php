@extends('layouts.admin')

@section('title','Gestión de categorías')

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
        @can('categories.create')
            <a href="{{route('categories.create')}}" class="nav-link">
                <span class="btn btn-dark btn-rounded">
                    + Categoría
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
                Gestión de categorías
            </h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb breadcrumb-custom">
                    <li class="breadcrumb-item"><a href="{{route('home')}}">Inicio</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Categorías</li>
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
                            <th>Descripción</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($categories as $category)
                            <tr>
                                <th scope="row">{{ $category->id }}</th>
                                <td>
                                    {{ $category->name }}
                                </td>
                                <td>{{ $category->description }}</td>
                                <td align="center" style="width:50px;">
                                    {!! Form::open(['route'=>['categories.destroy', $category], 'method'=>'DELETE']) !!}
                                        @can('categories.edit')
                                            <a href="{{route('categories.edit', $category)}}" class="jsgrid-button jsgrid-edit-button" title="Editar">
                                                <i class="far fa-edit"></i>
                                            </a>
                                        @endcan

                                        @can('categories.destroy')
                                            <button type="submit" class="jsgrid-button jsgrid-delete-button unstyled-button delete-confirm" data-name="{{ $category->name }}" title="Eliminar"><i class="far fa-trash-alt"></i>
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