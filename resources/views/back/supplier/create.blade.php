@extends('layouts.admin')

@section('title','Registrar proveedor')

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
                Registro de proveedores
            </h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb breadcrumb-custom">
                    @can('home')
                        <li class="breadcrumb-item"><a href="{{route('home')}}">Inicio</a></li>
                    @endcan
                    @can('suppliers.index')
                        <li class="breadcrumb-item"><a href="{{route('suppliers.index')}}">Proveedores</a></li>
                    @endcan
                    <li class="breadcrumb-item active" aria-current="page">Registro de proveedores</li>
                </ol>
            </nav>
        </div>
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <h4 class="card-title">Registro de proveedores</h4>
                        </div>

                        {!! Form::open(['route'=>'suppliers.store', 'method'=>'POST', 'files'=>true]) !!}

                        <div class="row">
                            <div class="form-group col-md-6" >
                                <div id="icon_div">
                                    <label for="name">Nombre</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon3"><i class="fa fa-info-circle"></i></span>
                                        </div>
                                        <input id="name" type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="name" placeholder="Nombre del proveedor" required>

                                        @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="form-group col-md-6" >
                                <div id="icon_div">
                                    <label for="place_origin">Lugar de origen</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon3"><i class="fas fa-map-marker-alt"></i></span>
                                        </div>
                                        <input id="place_origin" type="text" place_origin="place_origin" class="form-control @error('place_origin') is-invalid @enderror" id="place_origin" placeholder="Ejm: Lima" required>

                                        @error('place_origin')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                        </div>
                            
                            @can('suppliers.index')
                                <a href="{{route('suppliers.index')}}" class="btn btn-outline-dark btn-rounded float-right">Cancelar</a>
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
@endsection