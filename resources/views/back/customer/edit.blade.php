@extends('layouts.admin')

@section('title','Editar cliente')

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
                Editar clientes
            </h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb breadcrumb-custom">
                    @can('home')
                        <li class="breadcrumb-item"><a href="{{route('home')}}">Dashboard</a></li>
                    @endcan
                    @can('customers.index')
                        <li class="breadcrumb-item"><a href="{{route('customers.index')}}">Clientes</a></li>
                    @endcan
                    <li class="breadcrumb-item active" aria-current="page">Editar cliente</li>
                </ol>
            </nav>
        </div>
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <h4 class="card-title">Editar cliente</h4>
                        </div>

                        {!! Form::model($customer, ['route'=>['customers.update', $customer], 'method'=>'PUT']) !!}
                            <div class="form-group" >
                                <div id="icon_div">
                                    <label for="name">Nombre</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon3"><i class="fas fa-info-circle"></i></span>
                                        </div>
                                        <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" value="{{$customer->name}}" required>
                                    </div>                                    
                                </div>
                            </div>

                            <div class="form-group" >
                                <div id="icon_div">
                                    <label for=adress>Dirección</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon3"><i class="fas fa-home"></i></span>
                                        </div>
                                        <input type="text" name="adress" id="adress" class="form-control @error('adress') is-invalid @enderror" value="{{$customer->adress}}" required>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group col-md-6" >
                                    <div id="icon_div">
                                        <label for="phone">Teléfono</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon3"><i class="fas fa-mobile"></i></span>
                                            </div>

                                            <input type="number" name="phone" id="phone" class="form-control @error('phone') is-invalid @enderror" value="{{$customer->phone}}" required>

                                            @error('phone')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group col-md-6" >
                                    <div id="icon_div">
                                        <label for="dni">DNI</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon3"><i class="far fa-address-card"></i></span>
                                            </div>
                                            <input id="dni" type="text" name="dni" class="form-control @error('dni') is-invalid @enderror" id="dni" value="{{$customer->dni}}" required>

                                            @error('dni')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            @can('customers.index')
                                <a href="{{route('customers.index')}}" class="btn btn-light float-right">Cancelar</a>
                            @endcan  

                            <button type="submit" class="btn btn-primary mr-2 float-right">Actualizar</button>                     
                        {!! Form::close() !!}
                    </div>                
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
@endsection