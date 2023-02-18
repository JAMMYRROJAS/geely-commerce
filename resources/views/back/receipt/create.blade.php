@extends('layouts.admin')

@section('title','Registro de compra')

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
                Registro de compras
            </h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb breadcrumb-custom">
                    @can('home')
                        <li class="breadcrumb-item"><a href="{{route('home')}}">Dashboard</a></li>
                    @endcan
                    @can('receipts.index')
                        <li class="breadcrumb-item"><a href="{{route('receipts.index')}}">Compras</a></li>
                    @endcan
                    <li class="breadcrumb-item active" aria-current="page">Registro de compras</li>
                </ol>
            </nav>
        </div>
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    {!! Form::open(['route'=>'receipts.store', 'method'=>'POST']) !!}
                        <div class="card-body">
                            <div class="d-flex justify-content-between">
                                <h4 class="card-title">Registro de compras</h4>
                            </div>
                            
                            @include('back.receipt._form')
                            
                        </div>
                        
                        <div class="card-footer text-muted clearfix">
                            @can('receipts.index')
                                <a href="{{route('receipts.index')}}" class="btn btn-light float-right">Cancelar</a>
                            @endcan

                            <button type="submit" id="guardar" class="btn btn-primary float-right mr-2">Registrar compra</button>
                        </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    {!! Html::script('plantilla/js/alerts.js') !!}
    {!! Html::script('plantilla/js/avgrund.js') !!}

    <script>
        $(document).ready(function () {
            $("#agregar").click(function () {
                agregar();

                var select = document.getElementById("product_id");
                //select.options[select.selectedIndex].style.display = "none";
                select.options[select.selectedIndex].disabled = "true";
                select.value = "";
            });
        });
        
        var cont = 0;
        total = 0;
        subtotal = [];
        
        $("#guardar").hide();
        
        function agregar() {
        
            product_id = $("#product_id").val();
            producto = $("#product_id option:selected").text();
            quantity = $("#quantity").val();
            price = $("#price").val();
        
            if (product_id != "" && quantity != "" && quantity > 0 && quantity%1 == 0 && price != "" && producto != "" && producto != "--- Seleccione un producto ---") {
                subtotal[cont] = quantity * price;
                total = total + subtotal[cont];
                
                var fila = '<tr class="selected" id="fila'+cont+'"><td><button type="button" class="btn btn-danger btn-sm" onclick="eliminar('+cont+')"><i class="fa fa-times"></i></button></td> <td><input type="hidden" name="product_id[]" value="'+product_id+'">'+producto+'</td> <td> <input type="hidden" id="price[]" name="price[]" value="' + price + '"> <input class="form-control" type="number" id="price[]" value="' + price + '" disabled> </td>  <td> <input type="hidden" name="quantity[]" value="' + quantity + '"> <input class="form-control" type="number" value="' + quantity + '" disabled> </td> <td align="right">s/' + subtotal[cont] + ' </td></tr>';
                
                cont++;

                limpiar();
                totales();
                evaluar();
                $('#detalles').append(fila);
            } else {
                Swal.fire({
                    type: 'error',
                    text: 'Rellene todos los campos del detalle de la compra',
                })
            }
        }
        
        function limpiar() {
            $("#quantity").val("");
            $("#price").val("");
        }
        
        function totales() {
            total_pagar = total;
            $("#total_pagar_html").html("PEN " + total_pagar.toFixed(2));
            $("#total_pagar").val(total_pagar.toFixed(2));
        }
        
        function evaluar() {
            if (total > 0) {
                $("#guardar").show();
            } else {
                $("#guardar").hide();
            }
        }
        
        function eliminar(index) {
            total = total - subtotal[index];
            total_pagar_html = total;
            $("#total_pagar_html").html("PEN" + total_pagar_html);
            $("#total_pagar").val(total_pagar_html.toFixed(2));
            $("#fila" + index).remove();
            evaluar();
        }        
    </script>
@endsection