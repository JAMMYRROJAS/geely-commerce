@extends('layouts.admin')

@section('title', 'Reportes')

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
@endsection

@section('preference')
@endsection

@section('content')
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title">
                Reporte de ventas por fecha
            </h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb breadcrumb-custom">
                    <li class="breadcrumb-item"><a href="{{route('home')}}">Inicio</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Reportes de ventas</li>
                </ol>
            </nav>
        </div>

        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-12">
                        {!! Form::open(['route'=>'report.results', 'method'=>'POST']) !!}
                            <div class="row ">
                                <div class="col-12 col-md-3">
                                    <span>Fecha inicial</span>
                                    <div class="form-group">
                                        <input class="form-control" type="date" 
                                        value="{{old('fecha_ini')}}" 
                                        name="fecha_ini" id="fecha_ini">
                                    </div>
                                </div>
                                <div class="col-12 col-md-3">
                                    <span>Fecha final</span>
                                    <div class="form-group">
                                        <input class="form-control" type="date" 
                                        value="{{old('fecha_fin')}}" 
                                        name="fecha_fin" id="fecha_fin">
                                    </div>
                                </div>
                                <div class="col-12 col-md-3 text-center mt-4">
                                    <div class="form-group">
                                    <button type="submit" class="btn btn-dark btn-rounded btn-sm">Consultar</button>
                                    </div>
                                </div>
                                <div class="col-12 col-md-3 text-center">
                                    <span>Total de ingresos: <b> </b></span>
                                    <div class="form-group">
                                        <strong>s/ {{$total}}</strong>
                                    </div>
                                </div>
                            </div>
                        {!! Form::close() !!}

                        <div class="table-responsive">
                            <table id="order-listing" class="table">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Fecha</th>
                                        <th>Total</th>
                                        <th>Estado</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($sales as $sale)
                                        <tr>
                                            <th scope="row">
                                                <a href="{{route('sales.show', $sale)}}">{{$sale->id}}</a>
                                            </th>
                                            <td>{{$sale->sale_date}}</td>
                                            <td>{{$sale->total}}</td>
                                            <td>{{$sale->status}}</td>
                                            <td align="center" style="width:50px;">
                                                <a href="{{route('sales.pdf', $sale)}}" class="jsgrid-button jsgrid-edit-button"><i class="far fa-file-pdf"></i></a>

                                                <a href="{{route('sales.show', $sale)}}" class="jsgrid-button jsgrid-edit-button"><i class="far fa-eye"></i></a>
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
        window.onload = function(){
            var fecha = new Date(); //Fecha actual
            var mes = fecha.getMonth()+1; //obteniendo mes
            var dia = fecha.getDate(); //obteniendo dia
            var anio = fecha.getFullYear(); //obteniendo año
            if(dia<10)
                dia='0'+dia; //agrega cero si es menor de 10
            if(mes<10)
                mes='0'+mes //agrega cero si es menor de 10

            document.getElementById('fecha_fin').value=anio+"-"+mes+"-"+dia;
        }
    </script>
@endsection