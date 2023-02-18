<!DOCTYPE>
<html>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<title>Reporte de venta</title>
<style>
    body {
        /*position: relative;*/
        /*width: 16cm;  */
        /*height: 29.7cm; */
        /*margin: 0 auto; */
        /*color: #555555;*/
        /*background: #FFFFFF; */
        font-family: Arial, sans-serif;
        font-size: 14px;
        /*font-family: SourceSansPro;*/
    }


    #datos {
        float: left;
        margin-top: 0%;
        margin-left: 2%;
        margin-right: 2%;
        /*text-align: justify;*/
    }

    #encabezado {
        text-align: center;
        margin-left: 35%;
        margin-right: 35%;
        font-size: 15px;
    }

    #fact {
        /*position: relative;*/
        color: #ffffff;
        float: right;
        margin-top: 2%;
        margin-left: 2%;
        margin-right: 2%;
        font-size: 20px;
        background: #D2691E;
        padding: auto 10px;
        margin-bottom: 20px;
    }

    section {
        clear: left;
    }

    #cliente {
        text-align: left;
    }

    #facliente {
        width: 40%;
        border-collapse: collapse;
        border-spacing: 0;
        margin-bottom: 15px;
    }

    #fac,
    #fv,
    #fa {
        color: #FFFFFF;
        font-size: 15px;
    }

    #facliente thead {
        padding: 20px;
        background: #D2691E;
        text-align: left;
        border-bottom: 1px solid #FFFFFF;
    }

    #facvendedor {
        width: 100%;
        border-collapse: collapse;
        border-spacing: 0;
        margin-bottom: 15px;
    }

    #facvendedor thead {
        padding: 20px;
        background: #D2691E;
        text-align: center;
        border-bottom: 1px solid #FFFFFF;
    }

    #facproducto {
        width: 100%;
        border-collapse: collapse;
        border-spacing: 0;
        margin-bottom: 15px;
    }

    #facproducto thead {
        padding: 20px;
        background: #D2691E;
        text-align: center;
        border-bottom: 1px solid #FFFFFF;
    }

</style>

<body>
    <header>
        <div>
            <table id="datos">
                <thead>
                    <tr>
                        <th>VENDEDOR: {{$sale->user->name}}</th> 
                    </tr>
                </thead>

                <br> 
                <br>

                <thead>
                    <tr>
                        <th>DATOS DEL CLIENTE</th><br>
                        <tbody>
                            <tr>
                                <th>
                                    <p>
                                        Nombre: {{$sale->customer->name}}
                                        <br> 
                                        Celular: {{$sale->customer->phone}}<br>                                
                                        Dirección: {{$sale->customer->adress}}<br>
                                    </p>
                                </th>
                            </tr>
                        </tbody>
                        <br>
                        <br>
                    </tr>
                </thead>
            </table>
        </div>
        <div id="fact">
            <p align="center">
                NUMERO DE VENTA
                <br>
                {{$sale->id}}
            </p>
        </div>
    </header>
    <br>
    <br>
    <section>
        <div>
            <table id="facproducto">
                <thead>
                    <tr id="fa">
                        <th>PRODUCTO</th>
                        <th>CANTIDAD</th>
                        <th>PRECIO VENTA (PEN)</th>
                        <th>DESCUENTO (%)</th>
                        <th>SUBTOTAL (PEN)</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($saleDetails as $saleDetail)
                        <tr>
                            <td align="center">{{$saleDetail->product->name}}</td>
                            <td align="center">{{$saleDetail->quantity}}</td>
                            <td align="center">s/ {{$saleDetail->price}}</td>
                            <td align="center">{{number_format($saleDetail->discount, 0)}}%</td>
                            <td align="right">s/ {{number_format($saleDetail->quantity*$saleDetail->price - $saleDetail->quantity*$saleDetail->price*$saleDetail->discount/100, 2)}}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
                
                <br>
                <br>
                <br>

                <tfoot>
                    <tr>
                        <th colspan="4">
                            <p align="right">TOTAL PAGAR:</p>
                        </th>
                        <td>
                            <p align="right">s/ {{number_format($sale->total, 2)}}</p>
                        </td>
                    </tr>                  
                </tfoot>
            </table>
        </div>
    </section>
    <br>
    <br>
    <footer>
        <!--puedes poner un mensaje aqui-->
        <div id="datos">
        </div>
    </footer>
</body>

</html>