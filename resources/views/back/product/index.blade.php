@extends('layouts.admin')

@section('title','Gestión de productos')

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
        @can('products.create')
            <a href="{{route('products.create')}}" class="nav-link">
                <span class="btn btn-primary">
                    + Producto
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
                Productos
            </h3>
            <nav aria-label="breadcrumb">
                @can('home')
                    <ol class="breadcrumb breadcrumb-custom">
                        <li class="breadcrumb-item"><a href="{{route('home')}}">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Productos</li>
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
                            <th>Descripción</th>
                            <th>Datos adicionales</th>
                            <th>Categoría</th>
                            <th>Stock</th>
                            <th>Estado</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($products as $product)
                            <tr>
                                <th scope="row">{{ $product->id }}</th>
                                <td>{{$product->name}}</a>
                                </td>
                                <td>{{ $product->large_description }}</td>
                                <td>{{ $product->small_description }}</td>
                                <td>{{ $product->category->name }}</td>
                                <td>{{ $product->stock }}</td>

                                @if($product->status == "ACTIVATE")
                                    <td>
                                        @can('change.status.products')
                                            <a href="{{route('change.status.products', $product)}}" class="btn btn-success" title="Editar">
                                                ACTIVO <i class="fas fa-check ml-1"></i>
                                            </a>
                                        @endcan
                                    </td>
                                @else
                                    <td>
                                        @can('change.status.products')
                                            <a href="{{route('change.status.products', $product)}}" class="btn btn-danger" title="Editar">
                                                DESACTIVADO <i class="fas fa-times ml-1"></i>
                                            </a>
                                        @endcan                                
                                    </td>
                                @endif

                                <td align="center" style="width:50px;">
                                    @can('products.edit')
                                        <a href="{{route('products.edit', $product)}}" class="jsgrid-button jsgrid-edit-button" title="Editar">
                                            <i class="far fa-edit"></i>
                                        </a>
                                    @endcan

                                    @can('products.show')
                                        <a href="{{route('products.show', $product)}}" class="jsgrid-button jsgrid-edit-button"><i class="far fa-eye"></i></a>
                                    @endcan
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