@extends('layouts.admin')

@section('title','Gestión del negocio')

@section('styles')
    <style type="text/css">
        .unstyled-button {
            border: none;
            padding: 0;
            background: none;
        }

        div.ancho {
            max-width: 50%;
        }

        img.img-style {
            max-width: 100%;
            height: auto;
        }
    </style>
@endsection

@section('create')

@endsection

@section('preference')
@endsection

@section('content')
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title">
                Gestión del negocio
            </h3>
            <nav aria-label="breadcrumb">
                @can('home')
                    <ol class="breadcrumb breadcrumb-custom">
                        <li class="breadcrumb-item"><a href="{{route('home')}}">Inicio</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Negocio</li>
                    </ol>
                @endcan                
            </nav>
        </div>

        <div class="row">
            <div class="col-md-6 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body d-flex flex-column">
                        <h4 class="card-title">
                            <i class="fas fa-chart-pie"></i>
                            Información de la empresa
                        </h4>
                        <div class="flex-grow-1 d-flex flex-column justify-content-between">
                            <strong>Nombre </strong>
                            <p class="text-muted">
                                {{$commerce->name}}
                            </p>
                            <strong>Descripción</strong>
                            <p class="text-muted">
                                {{$commerce->description}}
                            </p>
                            <strong>Dirección</strong>
                            <p class="text-muted">
                                {{$commerce->address}}
                            </p>
                        </div>                            
                    </div>
                </div>
            </div>

            <div class="col-md-6 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body d-flex flex-column">
                        <h4 class="card-title">
                            <i class="fas fa-chart-pie"></i>
                            Información de contacto
                        </h4>
                        <div class="flex-grow-1 d-flex flex-column justify-content-between">
                            <strong>Número de contacto</strong>
                            <p class="text-muted mt-3">
                                {{$commerce->phone}}
                            </p>
                            <strong>Correo electrónico</strong>
                            <p class="text-muted mt-3">
                                {{$commerce->email}}
                            </p>
                            <strong>Logo del negocio</strong>
                            <div class="clearfix border-bottom text-center pb-4 mt-3">
                                <img src="{{asset('/logo/'.$commerce->logo)}}" alt="profile" class="img-lg mt-2 float-left img-style">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div><!--.row-->

        <div class="card-footer text-muted clearfix">
            <button type="button" class="btn btn-dark btn-rounded float-right" data-toggle="modal" data-target="#exampleModal-2">Modificar información</button>
        </div>
    </div><!--.content-wrapper-->

    <div class="modal fade" id="exampleModal-2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel-2" aria-hidden="true">
        <div class="modal-dialog ancho" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel-2">{{$commerce->name}}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                {!! Form::model($commerce,['route'=>['commerce.update', $commerce], 'method'=>'PUT', 'files' => true]) !!}
                    <div class="modal-body mb-0">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="name">Nombre</label>
                                    <input type="text" class="form-control" name="name" id="name" value="{{$commerce->name}}" required>
                                </div>

                                <div class="form-group">
                                    <label for="description">Descripción</label>
                                    <textarea class="form-control" name="description" id="description" rows="3">{{$commerce->description}}</textarea>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="phone">Numero de contacto</label>
                                    <input type="text" class="form-control" name="phone" id="phone" value="{{$commerce->phone}}"
                                        required>
                                </div>

                                <div class="form-group">
                                    <label for="phone">Email</label>
                                    <input type="email" class="form-control" name="email" id="email" value="{{$commerce->email}}"
                                        required>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="address">Dirección</label>
                                    <input type="text" class="form-control" name="address" id="address" value="{{$commerce->address}}" required>
                                </div>

                                <div class="form-group">
                                    <h5 class="card-title d-flex">Logo del negocio
                                        <small class="ml-auto align-self-end">
                                        <a href="dropify.html" class="font-weight-light" target="_blank"></a>
                                        </small>
                                    </h5>
                                    <input type="file" name="logo" id="logo" class="dropify" />
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer mt-0">
                        <button type="submit" class="btn btn-success">Actualizar</button>
                        <button type="button" class="btn btn-light" data-dismiss="modal">Cancelar</button>
                    </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    {!! Html::script('plantilla/js/data-table.js') !!}
    {!! Html::script('plantilla/js/dropify.js') !!}
@endsection