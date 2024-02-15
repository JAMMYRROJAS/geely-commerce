@extends('layouts.admin')

@section('title','Información del producto')

@section('styles')
    <style type="text/css">
        img.img-style {
            width: 70%;
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
            Detalles del producto
        </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb breadcrumb-custom">
                <li class="breadcrumb-item"><a href="{{route('home')}}">Inicio</a></li>
                @can('products.index')
                    <li class="breadcrumb-item"><a href="{{route('products.index')}}">Productos</a></li>
                @endcan
                <li class="breadcrumb-item active" aria-current="page">{{$product->name}}</li>
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
                                <img src="{{asset('/image/'.$product->image)}}" alt="profile" class="img-lg mb-3 img-style">

                                <h3>{{$product->name}}</h3>
                            </div>
                            
                            <div class="py-4">
                                <p class="clearfix">
                                    <span class="float-left">
                                        Estado
                                    </span>
                                    
                                    @if ($product->status == 'ACTIVATE')
                                        <span class="float-right text-muted">
                                            ACTIVO
                                        </span>
                                    @else
                                        <span class="float-right text-muted">
                                            DESACTIVADO
                                        </span>
                                    @endif
                                </p>

                                <p class="clearfix">
                                    <span class="float-left">
                                        Proveedor
                                    </span>
                                    <span class="float-right text-muted">
                                        <!-- Detalles del proveedor -->
                                        <a href="{{route('suppliers.show',$product->supplier->id)}}">
                                        {{$product->supplier->name}}
                                        </a>
                                    </span>
                                </p>
                                <p class="clearfix">
                                    <span class="float-left">
                                        Categoría
                                    </span>
                                    <span class="float-right text-muted">
                                        <!-- Productos por categoría //(si da el tiempo) -->
                                        {{$product->category->name}}
                                    </span>
                                </p>
                            </div>
                            @if ($product->status == 'ACTIVATE')
                                @can('change.status.products')
                                    <a href="{{route('change.status.products', $product)}}" class="btn btn-success btn-rounded btn-block">ACTIVO</a>
                                @endcan
                            @else
                                @can('change.status.products')
                                    <a href="{{route('change.status.products', $product)}}" class="btn btn-danger btn-rounded btn-block">DESACTIVADO</a>
                                @endcan
                            @endif
                        </div>

                        <div class="col-lg-8 pl-lg-5">
                            <div class="d-flex justify-content-between">
                                <div>
                                    <h4>Información del producto</h4>
                                </div>
                            </div>

                            <div class="profile-feed">
                                <div class="d-flex align-items-start profile-feed-item">
                                    <div class="form-group col-md-6">
                                        <strong><i class="fas fa-info-circle mr-1 mb-3"></i> Nombre</strong>
                                        <p class="text-muted">
                                            {{$product->name}}
                                        </p>
                                        <hr>
                                        <strong><i class="fas fa-align-left mr-1 mb-3"></i> Descripción</strong>
                                        <p class="text-muted">
                                            {{$product->large_description}}
                                        </p>
                                        <hr>
                                        <strong><i class="fab fa-product-hunt mr-1 mb-3"></i> Sub título</strong>
                                        <p class="text-muted">
                                            {{$product->small_description}}
                                        </p>
                                    </div>

                                    <div class="form-group col-md-6">
                                        <strong><i class="fas fa-archive mr-1 mb-3"></i> Stock</strong>
                                        <p class="text-muted">
                                            {{$product->stock}}
                                        </p>
                                        <hr>
                                        <strong><i class="fas fa-tags mr-1 mb-3"></i> Precio de venta</strong>
                                        <p class="text-muted">
                                            {{$product->sell_price}}
                                        </p>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card-footer text-muted">
                    <a href="{{route('products.index')}}" class="btn btn-outline-dark btn-rounded float-right">Regresar</a>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection
@section('scripts')
    {!! Html::script('plantilla/js/profile-demo.js') !!}
    {!! Html::script('plantilla/js/data-table.js') !!}
@endsection