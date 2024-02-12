@extends('layouts.admin')

@section('title','Información del cliente')

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
            Detalles del cliente
        </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb breadcrumb-custom">
                @can('home')
                    <li class="breadcrumb-item"><a href="{{route('home')}}">Inicio</a></li>
                @endcan
                @can('customers.index')
                    <li class="breadcrumb-item"><a href="{{route('customers.index')}}">Clientes</a></li>
                @endcan
                <li class="breadcrumb-item active" aria-current="page">{{$customer->name}}</li>
            </ol>
        </nav>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="border-bottom text-center pb-4">
                                <h3>{{$customer->name}}</h3>
                                <div class="d-flex justify-content-between">
                                </div>
                            </div>

                            <div class="border-bottom py-4">
                                <div class="list-group">
                                    <a class="list-group-item list-group-item-action active" id="list-home-list" data-toggle="list" href="#list-home" user="tab" aria-controls="home">
                                        Sobre el cliente
                                    </a>
                                    <a type="button" class="list-group-item list-group-item-action" id="list-profile-list" data-toggle="list" href="#list-profile" user="tab" aria-controls="profile">
                                        Historial de compras
                                    </a>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-8 pl-lg-5">
                            <div class="tab-content" id="nav-tabContent">
                                <div class="tab-pane fade show active" id="list-home" user="tabpanel" aria-labelledby="list-home-list">
                                    <div class="d-flex justify-content-between">
                                        <div>
                                            <h4>Información del cliente</h4>
                                        </div>
                                    </div>

                                    <div class="profile-feed">
                                        <div class="d-flex align-items-start profile-feed-item">
                                            <div class="form-group col-md-6">
                                                <strong><i class="fas fa-info-circle mr-1 mb-3"></i> Nombre</strong>
                                                <p class="text-muted">
                                                    {{$customer->name}}
                                                </p>
                                                <hr>
                                                <strong><i class="fas fa-mobile mr-1 mb-3"></i> Teléfono</strong>
                                                <p class="text-muted">
                                                    {{$customer->phone}}
                                                </p>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <strong><i class="fas fa-home mr-1 mb-3"></i> Dirección</strong>
                                                <p class="text-muted">
                                                    {{$customer->adress}}
                                                </p>
                                                <hr>
                                                <strong><i class="fa fa-address-card mr-1 mb-3"></i> DNI</strong>
                                                <p class="text-muted">
                                                    {{$customer->dni}}
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div><!--.tab-pane-->

                                <div class="tab-pane fade" id="list-profile" user="tabpanel"
                                    aria-labelledby="list-profile-list">
                                    <div class="d-flex justify-content-between">
                                        <div>
                                            <h4>Historial de compras</h4>
                                        </div>
                                    </div>
                                    <div class="profile-feed">
                                        <div class="d-flex align-items-start profile-feed-item">    
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
                                                        @foreach ($customer->sales as $sale)
                                                        <tr>
                                                            <th scope="row">{{$sale->id}}</th>
                                                            <td>{{$sale->sale_date}}</td>
                                                            <td>{{$sale->total}}</td>
                                                            <td align="center" style="width: 50px;">
                                                                <a href="{{route('sales.show', $sale)}}" class="jsgrid-button jsgrid-edit-button"><i class="far fa-eye"></i></a>
                                                                <a href="{{route('sales.pdf', $sale)}}" class="jsgrid-button jsgrid-edit-button"><i class="far fa-file-pdf"></i></a>
                                                            </td>
                                                        </tr>
                                                        @endforeach
                                                    </tbody>
                                                    <tfoot>
                                                        <tr>
                                                          <td colspan="2"><strong>Total de monto comprado: </strong></td>
                                                          <td colspan="3" align="left"><strong>s/{{$total_receipt}}</strong></td>
                                                        </tr>
                                                    </tfoot>
                                                </table>
                                            </div>    
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card-footer text-muted">
                    @can('customers.index')
                        <a href="{{route('customers.index')}}" class="btn btn-outline-dark btn-rounded float-right">Regresar</a>
                    @endcan
                </div>
            </div>
        </div>
    </div>

</div>
@endsection
@section('scripts')
@endsection