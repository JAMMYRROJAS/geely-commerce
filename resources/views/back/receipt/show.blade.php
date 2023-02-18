@extends('layouts.admin')

@section('title','Detalles de compra')

@section('styles')

@endsection

@section('create')

@endsection

@section('options')

@endsection

@section('preference')

@endsection

@section('content')
<div class="content-wrapper">
    <div class="page-header">
        <h3 class="page-title">
            Detalles de compra
        </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb breadcrumb-custom">
                @can('home')
                    <li class="breadcrumb-item"><a href="{{route('home')}}">Dashboard</a></li>
                @endcan
                @can('receipts.index')
                    <li class="breadcrumb-item"><a href="{{route('receipts.index')}}">Compras</a></li> 
                @endcan
                <li class="breadcrumb-item active" aria-current="page">Detalles de compra</li>
            </ol>
        </nav>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="form-group row">
                        <div class="col-md-4 text-center">
                            <label class="form-control-label" for="num_compra"><strong>Comprador</strong></label>
                            <p>{{$receipt->user->name}}</p>
                        </div>
                        <div class="col-md-4 text-center">
                            <label class="form-control-label" for="nombre"><strong>Proveedor</strong></label>
                            <p><a href="{{route('suppliers.show', $receipt->supplier)}}">{{$receipt->supplier->name}}</a></p>
                        </div>
                        <div class="col-md-4 text-center">
                            <label class="form-control-label" for="num_compra"><strong>Número Compra</strong></label>
                            <p>{{$receipt->id}}</p>
                        </div>
                    </div>
                    <br /><br />

                    <div class="form-group row ">
                        <h4 class="card-title ml-3">Detalles de compra</h4>
                        <div class="table-responsive col-md-12">
                            <table id="detalles" class="table">
                                <thead>
                                    <tr>
                                        <th>Producto</th>
                                        <th>Precio (PEN)</th>
                                        <th>Cantidad</th>
                                        <th>SubTotal (PEN)</th>
                                    </tr>
                                </thead>
                                <tfoot>                                    
                                    <tr>
                                        <th colspan="3">
                                            <p align="right">TOTAL:</p>
                                        </th>
                                        <th>
                                            <p align="left">s/{{number_format($receipt->total, 2)}}</p>
                                        </th>
                                    </tr>
                    
                                </tfoot>
                                <tbody>
                                    @foreach($receiptDetails as $receiptDetail)
                                        <tr>
                                            <td>{{$receiptDetail->product->name}}</td>
                                            <td>s/{{$receiptDetail->price}}</td>
                                            <td>{{$receiptDetail->quantity}}</td>
                                            <td>s/{{number_format($receiptDetail->quantity*$receiptDetail->price, 2)}}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <div class="card-footer text-muted">
                    @can('receipts.index')
                        <a href="{{route('receipts.index')}}" class="btn btn-primary float-right">Regresar</a>
                    @endcan
                </div>

            </div>
        </div>
    </div>

</div>
@endsection
@section('scripts')
    {!! Html::script('plantilla/js/profile-demo.js') !!}
@endsection