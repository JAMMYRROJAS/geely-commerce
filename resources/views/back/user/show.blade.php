@extends('layouts.admin')
@section('title','Información sobre el usuario')
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
            Detalles del usuario {{$user->name}}
        </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb breadcrumb-custom">
                <li class="breadcrumb-item"><a href="{{route('home')}}">Inicio</a></li>
                @can('users.index')
                    <li class="breadcrumb-item"><a href="{{route('users.index')}}">Usuarios</a></li>
                @endcan
                <li class="breadcrumb-item active" aria-current="page">{{$user->name}}</li>
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
                                <h3>{{$user->name}}</h3>
                                <div class="d-flex justify-content-between">
                                </div>
                            </div>
                            <div class="border-bottom py-4">
                                <div class="list-group">
                                    <a class="list-group-item list-group-item-action active" id="list-home-list" data-toggle="list" href="#list-home" user="tab" aria-controls="home">
                                        Sobre el usuario
                                    </a>

                                    @can('receipts.create')
                                        <a type="button" class="list-group-item list-group-item-action" id="list-profile-list" data-toggle="list" href="#list-profile" user="tab" aria-controls="profile">Historial de compras</a>
                                    @endcan

                                    <a type="button" class="list-group-item list-group-item-action" id="list-messages-list" data-toggle="list" href="#list-messages" user="tab" aria-controls="messages">Historial de ventas</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-8 pl-lg-5">

                            <div class="tab-content" id="nav-tabContent">
                                <div class="tab-pane fade show active" id="list-home" user="tabpanel" aria-labelledby="list-home-list">
                                    <div class="d-flex justify-content-between">
                                        <div>
                                            <h4>Información del usuario</h4>
                                        </div>
                                    </div>
                                    <div class="profile-feed">
                                        <div class="d-flex align-items-start profile-feed-item">
                                            <div class="form-group col-md-6">
                                                <strong><i class="fab fa-product-hunt mr-1"></i> Nombre</strong>
                                                <p class="text-muted mt-3">
                                                    {{$user->name}}
                                                </p>
                                                <hr>
                                                <strong><i class="fab fa-product-hunt mr-1 mb-3"></i> Roles</strong>
                                                <p class="text-muted">
                                                    @foreach ($user->roles as $role)
                                                    <a href="{{route('roles.show',$role)}}">{{$role->name}}</a>
                                                    @endforeach
                                                </p>
                                                <hr>
                                            </div>
        
                                            <div class="form-group col-md-6">
                                                <strong>
                                                    <i class="fas fa-at mr-1 mb-3"></i>
                                                    Correo electrónico</strong>
                                                <p class="text-muted">
                                                    {{$user->email}}
                                                </p>
                                                <hr>
                                            </div>                                            
                                        </div>
                                    </div>
                                </div>

                                <div class="tab-pane fade" id="list-profile" user="tabpanel" aria-labelledby="list-profile-list">                                    
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
                                                            <th style="width:50px;">Acciones</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($user->receipts as $receipt)
                                                        <tr>
                                                            <th scope="row">{{$receipt->id}}</a>
                                                            </th>
                                                            <td>{{$receipt->receipt_date}}</td>
                                                            <td>{{$receipt->total}}</td>
                                                            <td align="center" style="width: 50px;">
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
                                                    <tfoot>
                                                        <tr>
                                                          <td colspan="2"><strong>Monto total comprado: </strong></td>
                                                          <td colspan="3" align="left"><strong>s/{{$total_receipt}}</strong></td>
                                                        </tr>
                                                    </tfoot>
                                                </table>
                                            </div>    
                                        </div>
                                    </div>
                                </div>

                                <div class="tab-pane fade" id="list-messages" user="tabpanel" aria-labelledby="list-messages-list">
                                    <div class="d-flex justify-content-between">
                                        <div>
                                            <h4>Historial de ventas</h4>
                                        </div>
                                    </div>
                                    <div class="profile-feed">
                                        <div class="d-flex align-items-start profile-feed-item">    
                                            <div class="table-responsive">
                                                <table id="order-listing1" class="table">
                                                    <thead>
                                                        <tr>
                                                            <th>Id</th>
                                                            <th>Fecha</th>
                                                            <th>Total</th>
                                                            <th style="width:50px;">Acciones</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($user->sales as $sale)
                                                        <tr>
                                                            <th scope="row">{{$sale->id}}</th>
                                                            <td>{{$sale->sale_date}}</td>
                                                            <td>{{$sale->total}}</td>                        
                                                            <td align="center" style="width: 50px;">
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
                                                    <tfoot>
                                                        <tr>
                                                          <td colspan="2"><strong>Monto total vendido: </strong></td>
                                                          <td colspan="4" align="left"><strong>s/{{$total_sold}}</strong></td>
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
                    @can('users.index')
                        <a href="{{route('users.index')}}" class="btn btn-outline-dark btn-rounded float-right">Regresar</a>
                    @endcan
                </div>
            </div>
        </div>
    </div>

</div>
@endsection

@section('scripts')
@endsection