@extends('layouts.admin')

@section('title','Registro de venta')

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
                Registro de ventas
            </h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb breadcrumb-custom">
                    <li class="breadcrumb-item"><a href="{{route('home')}}">Inicio</a></li>
                    @can('sales.index')
                        <li class="breadcrumb-item"><a href="{{route('sales.index')}}">Ventas</a></li>
                    @endcan
                    <li class="breadcrumb-item active" aria-current="page">Registro de ventas</li>
                </ol>
            </nav>
        </div>
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    {!! Form::open(['route'=>'sales.store', 'method'=>'POST']) !!}
                        <div class="card-body">
                            <div class="d-flex justify-content-between">
                                <h4 class="card-title">Registro de ventas</h4>
                            </div>
                            
                            @include('back.sale._form')
                            
                        </div>
                        
                        <div class="card-footer text-muted clearfix">
                            @can('sales.index')
                                <a href="{{route('sales.index')}}" class="btn btn-outline-dark btn-rounded float-right">Cancelar</a>
                            @endcan

                            <button type="submit" id="guardar" class="btn btn-dark btn-rounded float-right mr-2">Registrar venta</button>
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
                select.options[select.selectedIndex].disabled = "true";
                select.value = "";
            });
        });

        var save = 0;
        var cont = 1;
        total = 0;
        subtotal = [];
        
        $("#guardar").hide();
        $("#product_id").change(mostrarValores);

        function mostrarValores() {
            let datosProducto = document.getElementById('product_id').value.split('_');

            $("#stock").val(datosProducto[1]);
            $("#price").val(datosProducto[2]);
        }

        function agregar() {
            let producto = document.getElementById('product_id').value.split('_');

            product_id = producto[0];
            producto = $("#product_id option:selected").text();
            quantity = $("#quantity").val();
            discount = $("#discount").val();
            price = $("#price").val();
            stock = $("#stock").val();

            if (product_id != "" && quantity != "" && price != "" && producto != "" && producto != "--- Seleccione un producto ---") {
                if (parseInt(stock) >= parseInt(quantity)) {
                    if (discount == "") {
                        discount = 0;
                    }

                    subtotal[cont] = (quantity * price) - (quantity * price * discount / 100);
                    total = total + subtotal[cont];
                    
                    var fila = '<tr class="selected" id="fila' + cont + '"><td><button type="button" class="btn btn-danger btn-sm" onclick="eliminar(' + cont + ')"><i class="fa fa-times fa-2x"></i></button></td> <td><input type="hidden" name="product_id[]" value="' + product_id + '">' + producto + '</td> <td> <input type="hidden" name="price[]" value="' + parseFloat(price).toFixed(2) + '"> <input class="form-control" type="number" value="' + parseFloat(price).toFixed(2) + '" disabled> </td> <td> <input type="hidden" name="discount[]" value="' + parseFloat(discount) + '"> <input class="form-control" type="number" value="' + parseFloat(discount) + '" disabled> </td> <td> <input type="hidden" name="quantity[]" value="' + quantity + '"> <input type="number" value="' + quantity + '" class="form-control" disabled> </td> <td align="right">s/' + parseFloat(subtotal[cont]).toFixed(2) + '</td></tr>';

                    cont++;
                    limpiar();
                    totales();
                    evaluar();
                    $('#detalles').append(fila);
                    save = 1;
                } else {
                    swal({
                        title: `Ups! Algo salió mal`,
                        text: "Rellene todos los campos o verifique los datos",
                        icon: "warning",
                        button: "OK",
                        dangerMode: true,
                    })
                }
            } else {
                swal({
                    title: `Ups! Algo salió mal`,
                    text: "Rellene todos los campos o verifique los datos",
                    icon: "warning",
                    button: "OK",
                    dangerMode: true,
                })
            }
        }

        function limpiar() {
            $("#quantity").val("");
            $("#discount").val("0");
            $("#price").val("");
            $("#stock").val("");
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
            $("#total").html("PEN" + total);
            $("#total_pagar_html").html("PEN" + total_pagar_html);
            $("#total_pagar").val(total_pagar_html.toFixed(2));
            $("#fila" + index).remove();
            evaluar();
            save = 0;
        }
    </script>
@endsection