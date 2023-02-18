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
                Reporte de ventas
            </h3>
            <nav aria-label="breadcrumb">
                @can('home')
                    <ol class="breadcrumb breadcrumb-custom">
                        <li class="breadcrumb-item"><a href="{{route('home')}}">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Reporte de ventas</li>
                    </ol>
                @endcan
            </nav>
        </div>

        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-12">
                        
                        <div class="row ">
                            <div class="col-12 col-md-4 text-center">
                                <span>Fecha de consulta: <b> </b></span>
                                <div class="form-group">
                                    <strong>{{\Carbon\Carbon::now()->format('d/m/Y')}}</strong>
                                </div>
                            </div>
                            <div class="col-12 col-md-4 text-center">
                                <span>Cantidad de registros: <b></b></span>
                                <div class="form-group">
                                    <strong>{{$sales->count()}}</strong>
                                </div>
                            </div>
                            <div class="col-12 col-md-4 text-center">
                                <span>Total de ingresos: <b> </b></span>
                                <div class="form-group">
                                    <strong>s/ {{$total}}</strong>
                                </div>
                            </div>
                        </div>
                    
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
@endsection