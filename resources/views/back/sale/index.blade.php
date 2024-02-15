@extends('layouts.admin')

@section('title','Gestión de ventas')

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

        a.disabled {
            pointer-events: none; 
            cursor: default; 
        }
    </style>
@endsection

@section('create')
    <li class="no-hidden nav-item d-none d-lg-flex">
        @can('sales.create')
            <a href="{{route('sales.create')}}" class="nav-link">
                <span class="btn btn-dark btn-rounded">
                    + Venta
                </span>
            </a>
        @endcan
    </li>
@endsection

@section('preference')
@endsection

@section('content')
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title">
                Ventas
            </h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb breadcrumb-custom">
                    <li class="breadcrumb-item"><a href="{{route('home')}}">Inicio</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Ventas</li>
                </ol>
            </nav>
        </div>

        <div class="card">
        <div class="card-body">
            <div class="row">
            <div class="col-12">
                <div class="table-responsive">
                <table id="order-listing" class="table">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Fecha</th>
                            <th>Total</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($sales as $sale)
                            <tr>
                                <th scope="row">{{$sale->id}}</a>
                                </th>

                                <td>{{$sale->sale_date}}</td>
                                
                                <td>{{$sale->total}}</td>

                                <td align="center" style="width:50px;">
                                    @can('sales.pdf')
                                        <a href="{{route('sales.pdf', $sale)}}" class="jsgrid-button jsgrid-edit-button"><i class="far fa-file-pdf"></i></a>
                                    @endcan

                                    @can('sales.show')
                                        <a href="{{route('sales.show', $sale)}}" class="jsgrid-button jsgrid-edit-button"><i class="far fa-eye"></i></a>
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
    </div><!--.content-wrapper-->
@endsection

@section('scripts')
    {!! Html::script('plantilla/js/data-table.js') !!}
@endsection