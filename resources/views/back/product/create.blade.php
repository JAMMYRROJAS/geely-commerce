@extends('layouts.admin')

@section('title','Registrar producto')

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
                Registro de productos
            </h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb breadcrumb-custom">
                    <li class="breadcrumb-item"><a href="{{route('home')}}">Inicio</a></li>
                    @can('products.index')
                        <li class="breadcrumb-item"><a href="{{route('products.index')}}">Productos</a></li>
                    @endcan
                    <li class="breadcrumb-item active" aria-current="page">Registro de productos</li>
                </ol>
            </nav>
        </div>
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <h4 class="card-title">Registro de productos</h4>
                        </div>

                        {!! Form::open(['route'=>'products.store', 'method'=>'POST', 'files'=>true]) !!}
                            <div class="row">
                                <div class="form-group col-md-3" >
                                    <div id="icon_div">
                                        <label for="name">Nombre</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon3"><i class="fa fa-info-circle"></i></span>
                                            </div>
                                            <input id="name" type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="name" placeholder="Nombre del producto" required>

                                            @error('name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group col-md-3" >
                                    <div id="icon_div">
                                        <label for="sell_price">Precio de venta</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon3">s/</span>
                                            </div>
                                            <input id="sell_price" type="text" name="sell_price" class="form-control @error('sell_price') is-invalid @enderror" id="name" placeholder="0" required>

                                            @error('sell_price')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group col-md-3">
                                    <label for=category_id>Categoría</label>
                                    <select name="category_id" id="category_id" class="form-control">
                                        @foreach ($categories as $category)
                                            <option value="{{$category->id}}">{{$category->name}}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group col-md-3">
                                    <label for=supplier_id>Proveedor</label>
                                    <select name="supplier_id" id="supplier_id" class="form-control">
                                        @foreach ($suppliers as $supplier)
                                            <option value="{{$supplier->id}}">{{$supplier->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group col-md-7" >
                                <label for="large_description">Descripción (opcional)</label>
                                    <textarea name="large_description" id="large_description" rows="4" class="form-control"></textarea>
                                </div>

                                <div class="form-group col-md-5" >
                                <label for="small_description">Datos adicionales (opcional)</label>
                                    <textarea name="small_description" id="small_description" rows="2" class="form-control"></textarea>
                                </div>
                            </div>

                            <div class="form-group">
                                <h4 class="card-title d-flex">Imagen del producto (opcional)
                                    <small class="ml-auto align-self-end">
                                    <a href="dropify.html" class="font-weight-light" target="_blank"></a>
                                    </small>
                                </h4>
                                <input type="file" name="image" id="image" class="dropify" />
                            </div>

                            @can('products.index')
                                <a href="{{route('products.index')}}" class="btn btn-outline-dark btn-rounded float-right">Cancelar</a> 
                            @endcan
                            <button type="submit" class="btn btn-dark btn-rounded mr-2 float-right">Registrar</button>                    
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