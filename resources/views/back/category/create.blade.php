@extends('layouts.admin')

@section('title','Registrar categoría')

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
                Registro de categorías
            </h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb breadcrumb-custom">
                    @can('home')
                        <li class="breadcrumb-item">
                            <a href="{{route('home')}}">Dashboard</a>
                        </li>
                    @endcan
                    @can('categories.index')
                        <li class="breadcrumb-item">
                            <a href="{{route('categories.index')}}">Categorías</a>
                        </li>
                    @endcan
                    <li class="breadcrumb-item active" aria-current="page">
                        Registro de categorías
                    </li>
                </ol>
            </nav>
        </div>
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <h4 class="card-title">Registro de categorías</h4>
                        </div>

                        {!! Form::open(['route'=>'categories.store', 'method'=>'POST']) !!}
                            @include('back.category._form')

                            @can('categories.index')
                                <a href="{{route('categories.index')}}" class="btn btn-light float-right">Cancelar</a>
                            @endcan
                            <button type="submit" class="btn btn-primary mr-2 float-right">Registrar</button>
                        {!! Form::close() !!}
                    </div>                
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')

@endsection