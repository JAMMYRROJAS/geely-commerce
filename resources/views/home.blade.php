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
    <div class="content-wrapper d-flex justify-content-center align-items-center">
        <div class="d-flex flex-column my-4">
            <h1 class="mb-4 text-center">Panel administrador</h1>
            <img src="{{asset('/logo/'.$image)}}" alt="Log del negocio" class="img-fluid mt-4">
        </div>
        
    </div>
@endsection

@section('scripts')

@endsection
