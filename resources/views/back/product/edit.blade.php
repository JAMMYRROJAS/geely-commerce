@extends('layouts.admin')

@section('title','Editar producto')

@section('styles')
@endsection

@section('options')
@endsection

@section('preference')
@endsection

@section('content')
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title">
                Editar producto
            </h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb breadcrumb-custom">
                    @can('home')
                        <li class="breadcrumb-item"><a href="{{route('home')}}">Dashboard</a></li>
                    @endcan
                    @can('products.index')
                        <li class="breadcrumb-item"><a href="{{route('products.index')}}">Productos</a></li>
                    @endcan
                    <li class="breadcrumb-item active" aria-current="page">Editar producto</li>
                </ol>
            </nav>
        </div>
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <h4 class="card-title">Editar producto</h4>
                        </div>

                        {!! Form::model($product, ['route'=>['products.update',$product->id], 'method'=>'PUT', 'files'=>true]) !!}
                            <div class="form-group" >
                                <div id="icon_div">
                                    <label for="name">Nombre</label>
                                    <input type="text" name="name" id="name" value="{{$product->name}}" class="form-control" required>
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group col-md-7" >
                                    <label for="large_description">Descripción</label>
                                    <textarea name="large_description" id="large_description" rows="4" class="form-control">{{old('large_description', $product->large_description)}}</textarea>
                                </div>

                                <div class="form-group col-md-5" >
                                    <label for="small_description">Datos adicionales</label>
                                    <textarea name="small_description" id="small_description" rows="2" class="form-control">{{old('small_description', $product->small_description)}}</textarea>
                                </div>
                            </div>

                            <div class="form-group" >
                                <div id="icon_div">
                                    <label for=sell_price>Precio de venta</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon3">s/</span>
                                        </div>
                                        <input type="number" name=sell_price id=sell_price value="{{$product->sell_price}}" class="form-control" required>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group" >
                                <label for=category_id>Categoría</label>
                                <select name="category_id" id="category_id" class="form-control">
                                    @foreach ($categories as $category)
                                        <option value="{{$category->id}}"
                                            @if($category->id == $product->category_id)
                                                selected
                                            @endif
                                        >{{$category->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            
                            <div class="form-group" >
                                <label for=supplier_id>Proveedor</label>
                                <select name="supplier_id" id="supplier_id" class="form-control">
                                    @foreach ($suppliers as $supplier)
                                        <option value="{{$supplier->id}}" 
                                            @if($supplier->id == $product->supplier_id)
                                                selected
                                            @endif
                                        >{{$supplier->name}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <h4 class="card-title d-flex">Imagen del producto
                                    <small class="ml-auto align-self-end">
                                    <a href="dropify.html" class="font-weight-light" target="_blank"></a>
                                    </small>
                                </h4>
                                <input type="file" name="image" id="image" class="dropify" />
                            </div>
                            
                            <button type="submit" class="btn btn-primary mr-2">Actualizar</button>
                            @can('products.index')
                                <a href="{{route('products.index')}}" class="btn btn-light">Cancelar</a>
                            @endcan                      
                        {!! Form::close() !!}
                    </div>                
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    {!! Html::script('plantilla/js/dropify.js') !!}
@endsection