@extends('layouts.admin')

@section('title','Gestión de compras')

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
        @can('receipts.create')
            <a href="{{route('receipts.create')}}" class="nav-link">
                <span class="btn btn-primary">
                    + Compra
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
                Compras
            </h3>
            <nav aria-label="breadcrumb">
                @can('home')
                    <ol class="breadcrumb breadcrumb-custom">
                        <li class="breadcrumb-item"><a href="{{route('home')}}">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Compras</li>
                    </ol>
                @endcan
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
                        @foreach ($receipts as $receipt)
                            <tr>
                                <th scope="row">
                                    <a href="{{route('receipts.show', $receipt)}}">{{$receipt->id}}</a>
                                </th>
                                <td>{{$receipt->receipt_date}}</td>
                                <td>{{$receipt->total}}</td>
                                <td align="center" style="width:50px;">
                                    @can('receipts.pdf')
                                        <a href="{{route('receipts.pdf', $receipt)}}" class="jsgrid-button jsgrid-edit-button"><i class="far fa-file-pdf"></i></a>
                                    @endcan

                                    @can('receipts.show')
                                        <a href="{{route('receipts.show', $receipt)}}" class="jsgrid-button jsgrid-edit-button"><i class="far fa-eye"></i></a>
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