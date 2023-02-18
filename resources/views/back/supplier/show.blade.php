@extends('layouts.admin')

@section('title','Información del proveedor')

@section('styles')
    <style type="text/css">
        img.img-style {
            width: 150px;
            height: auto;
        }
    </style>
@endsection

@section('create')

@endsection

@section('options')

@endsection

@section('preference')

@endsection

@section('content')
<div class="content-wrapper">
    <div class="page-header">
        <h3 class="page-title">
           Detalles del proveedor
        </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb breadcrumb-custom">
                @can('home')
                    <li class="breadcrumb-item"><a href="{{route('home')}}">Dashboard</a></li>
                @endcan
                @can('suppliers.index')
                    <li class="breadcrumb-item"><a href="{{route('suppliers.index')}}">Proovedores</a></li>
                @endcan
                <li class="breadcrumb-item active" aria-current="page">{{$supplier->name}}</li>
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
                                <img src="{{asset('/image/proveedor.png')}}" alt="profile" class="img-lg mb-3 img-style">

                                <h3>{{$supplier->name}}</h3>
                            </div>

                            <div class="border-bottom py-4">
                                <div class="list-group">
                                    <a class="list-group-item list-group-item-action active" id="list-home-list" data-toggle="list" href="#list-home" role="tab" aria-controls="home">
                                        Sobre proveedor
                                    </a>

                                    <a type="button" class="list-group-item list-group-item-action" id="list-profile-list" data-toggle="list" href="#list-profile" role="tab" aria-controls="profile">
                                        Productos
                                    </a>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-8 pl-lg-5">
                            <div class="tab-content" id="nav-tabContent">
                                <div class="tab-pane fade show active" id="list-home" role="tabpanel" aria-labelledby="list-home-list">
                                    <div class="d-flex justify-content-between">
                                        <div>
                                            <h4>Información de proveedor</h4>
                                        </div>
                                    </div>

                                    <div class="profile-feed">
                                        <div class="d-flex align-items-start profile-feed-item">
                                            <div class="form-group col-md-6">
                                                <strong><i class="fab fa-product-hunt mr-1 mb-3"></i> Nombre</strong>
                                                <p class="text-muted">
                                                    {{$supplier->name}}
                                                </p>
                                                <hr>

                                                <strong><i class="fas fa-map-marker-alt mr-1 mb-3"></i> Lugar de origen</strong>
                                                <p class="text-muted">
                                                    {{$supplier->place_origin}}
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="tab-pane fade" id="list-profile" role="tabpanel" aria-labelledby="list-profile-list">
                                    <div class="d-flex justify-content-between">
                                        <div>
                                            <h4>Productos del proveedor {{$supplier->name}}</h4>
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
                                                            <th>Stock</th>
                                                            <th>Estado</th>
                                                            <th>Acciones</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($supplier->products as $product)
                                                        <tr>
                                                            <th scope="row">{{$product->id}}</th>
                                                            <td>{{ $product->name }}</td>
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
                        </div>
                    </div>
                </div>

                <div class="card-footer text-muted">
                    @can('suppliers.index')
                        <a href="{{route('suppliers.index')}}" class="btn btn-primary float-right">Regresar</a>
                    @endcan
                </div>

            </div>
        </div>
    </div>

</div>
@endsection
@section('scripts')
    {!! Html::script('admin/js/profile-demo.js') !!}
    {!! Html::script('admin/js/data-table.js') !!}
@endsection