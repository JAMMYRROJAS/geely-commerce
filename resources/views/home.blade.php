@extends('layouts.admin')

@section('title', 'Panel administrador')

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
                Panel administrador
            </h3>
        </div>

        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-12">
                        @foreach ($totales as $total)
                            <div class="row">
                                <div class="col-lg-6 col-xs-6">
                                    <div class="card text-white bg-success">
                                        <div class="card-body pb-0">
                                            <div class="float-right">
                                                <i class="fas fa-cart-arrow-down fa-4x"></i>
                                            </div>
                                            <div class="h2">Compras</div>
                                            <div class="text-value h4">
                                                <strong>PEN {{$total->totalcompra}} (MES ACTUAL)</strong>
                                            </div>
                                        </div>
                                        <div class="chart-wrapper mt-3 mx-3 pb-4" style="beight:35px;">
                                            @can('receipts.index')
                                                <a href="{{route('receipts.index')}}" class="small-box-footer h4">
                                                    Ir a compras <i class="fa fa-arrow-circle-right"></i>
                                                </a>
                                            @endcan
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-6 col-xs-6">
                                    <div class="card text-white bg-info">
                                        <div class="card-body pb-0">
                                            <div class="float-right">
                                                <i class="fas fa-shopping-cart fa-4x"></i>
                                            </div>
                                            <div class="h2">Ventas</div>
                                            <div class="text-value h4">
                                                <strong>PEN {{$total->totalventa}} (MES ACTUAL)</strong>
                                            </div>
                                        </div>
                                        <div class="chart-wrapper mt-3 mx-3 pb-4" style="beight:35px;">
                                            @can('sales.index')
                                                <a href="{{route('sales.index')}}" class="small-box-footer h4">
                                                    Ir a ventas <i class="fa fa-arrow-circle-right"></i>
                                                </a>
                                            @endcan   
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>

        <div class="mt-3 card">
            <div class="card-body">
                <div class="row">
                    <div class="col-12">
                        <div class="row">
                            <div class="col-md-6 grid-margin stretch-card">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="card-title">
                                            <i class="fas fa-chart-area"></i>
                                            Compras - Meses
                                        </h4>
                                        <canvas id="compras"></canvas>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 grid-margin stretch-card">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="card-title">
                                            <i class="fas fa-chart-area"></i>
                                            Ventas - Meses
                                        </h4>
                                        <canvas id="ventas"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">
                                    <i class="fas fa-chart-line"></i>
                                    Ventas diarias
                                </h4>
                                <canvas id="ventas_diarias" height="100"></canvas>
                                <div id="orders-chart-legend" class="orders-chart-legend"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="mt-3 card">
            <div class="card-body">
                <div class="row">
                    <div class="col-12">
                        <div class="row">
                            <div class="col-12 grid-margin">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="card-title">
                                            <i class="fas fa-table"></i>
                                            Productos más vendidos
                                        </h4>
                                        <div class="table-responsive">
                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                        <th scope="col">ID</th>
                                                        <th>Nombre</th>
                                                        <th>Stock</th>
                                                        <th>Cantidad vendida</th>
                                                        <th style="text-align: center">Acciones</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($productosvendidos as $productosvendido)
                                                        <tr>
                                                            <td>{{$productosvendido->id}}</td>
                                                            <td>{{$productosvendido->nombre}}</td>
                                                            <td><strong>{{$productosvendido->stock}}</strong> Unidades</td>
                                                            <td><strong>{{$productosvendido->quantity}}</strong> Unidades</td>
                                                            <td align="center" style="width:300px;">
                                                                @can('products.show')
                                                                    <a href="{{route('products.show', $productosvendido->id)}}" class="btn btn-primary mt-2 mb-2">
                                                                        <i class="far fa-eye"></i> Detalles
                                                                    </a>
                                                                @endcan
                                                                @can('receipts.create')
                                                                    <a href="{{route('receipts.create', $productosvendido->id)}}" class="btn btn-dark">
                                                                        <i class="fas fa-cart-arrow-down"></i> Comprar
                                                                    </a>
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
        </div>
    </div><!--.content-wrapper-->
@endsection

@section('scripts')
    {!! Html::script('plantilla/js/data-table.js') !!}
    {!! Html::script('plantilla/js/chart.js') !!}

    <script>
        $(function(){
            var varCompra=document.getElementById('compras').getContext('2d');
    
            var charCompra = new Chart(varCompra, {
                type: 'bar',
                data: {
                    labels: [<?php foreach ($comprasmes as $reg)
                        { 
                    
                    setlocale(LC_TIME, 'es_ES', 'Spanish_Spain', 'Spanish'); 
                    $mes_traducido=strftime('%B',strtotime($reg->mes));
            
                    echo '"'. $mes_traducido.'",';} ?>],
                    datasets: [{
                        label: 'Compras',
                        data: [<?php foreach ($comprasmes as $reg)
                            {echo ''. $reg->totalmes.',';} ?>],

                        backgroundColor: '#E91E63',
                        borderColor: '#E91E63',
                    }]
                },
                
                options: {
                    scales: {
                      yAxes: [{
                        ticks: {    
                            beginAtZero:true
                        }
                      }]
                    },
                    legend: {
                      display: false
                    }
                }
            });

            var varVenta=document.getElementById('ventas').getContext('2d');
            var charVenta = new Chart(varVenta, {
                type: 'bar',
                data: {
                    labels: [<?php foreach ($ventasmes as $reg)
                {
                    setlocale(LC_TIME, 'es_ES', 'Spanish_Spain', 'Spanish'); 
                    $mes_traducido=strftime('%B',strtotime($reg->mes));
                    
                    echo '"'. $mes_traducido.'",';} ?>],
                    datasets: [{
                        label: 'Ventas',
                        data: [<?php foreach ($ventasmes as $reg)
                        {echo ''. $reg->totalmes.',';} ?>],
                        backgroundColor: '#f96868',
                        borderColor: '#f96868'
                    }]
                },
                options: {
                    scales: {
                      yAxes: [{
                        ticks: {                            
                            beginAtZero:true
                        }
                      }]
                    },
                    legend: {
                      display: false
                    }
                }
            });

            var varVentaD=document.getElementById('ventas_diarias').getContext('2d');
            var charVenta = new Chart(varVentaD, {
                type: 'line',
                data: {
                    labels: [<?php foreach ($ventasdia as $ventadia)
                {
                    $dia = $ventadia->dia;  
                    
                    echo '"'. $dia.'",';} ?>],
                    datasets: [{
                        label: 'Ventas',
                        data: [<?php foreach ($ventasdia as $reg)
                        {echo ''. $reg->totaldia.',';} ?>],
                        borderColor: '#f96868',
                        borderWidth: 2
                    }]
                },
                options: {
                    scales: {
                      yAxes: [{
                        ticks: {                            
                            beginAtZero:true
                        }
                      }]
                    },
                    legend: {
                      display: false
                    },
                    elements: {
                      point: {
                        radius: 5,
                        backgroundColor: '#f96868'
                      }
                    }
                }
            });            
        });
    </script>
@endsection