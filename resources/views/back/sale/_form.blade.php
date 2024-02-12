<div class="row">
    <div class="form-group col-md-6" id="myform">
        <label for="customer_id">Cliente</label>
        <select name="customer_id" id="customer_id" class="form-control">
            <option value="" disabled selected>--- Seleccione un cliente ---</option>
            @foreach ($customers as $customer)
                <option value="{{$customer->id}}">{{$customer->name}}</option>
            @endforeach
        </select>
    </div>

    <div class="form-group col-md-6">
        <label for="product_id">Producto</label>
        <select name="product_id" id="product_id" class="form-control">
            <option value="" disabled selected>--- Seleccione un producto ---</option>
            @foreach ($products as $product)
                @if ($product->status == "ACTIVATE" && $product->stock > 0)
                    <option value="{{$product->id}}_{{$product->stock}}_{{$product->sell_price}}">{{$product->name}}</option>
                @endif
            @endforeach
        </select>
    </div>
</div>

<div class="row">
    <div class="form-group col-md-3" >
        <div id="icon_div">
            <label for="">Stock actual</label>
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon3"><i class="fas fa-archive"></i></span>
                </div>
                <input type="number" name="" id="stock" class="form-control" disabled>
            </div>
        </div>
    </div>

    <div class="form-group col-md-3" >
        <div id="icon_div">
            <label for="">Precio de venta</label>
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon3">s/</span>
                </div>
                <input type="number" name="price" id="price" class="form-control" disabled>
            </div>
        </div>
    </div>

    <div class="form-group col-md-3" >
        <div id="icon_div">
            <label for="quantity">Cantidad a vender</label>
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon3"><i class="fas fa-shopping-cart menu-iconn"></i></span>
                </div>
                <input type="number" name="quantity" id="quantity" class="form-control" placeholder="0">
            </div>
        </div>
    </div>

    
    <div class="form-group col-md-3" >
        <div id="icon_div">
            <label for="discount">% Descuento</label>
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon3">%</span>
                </div>
                <input type="number" name="discount" id="discount" class="form-control" placeholder="0">
            </div>
        </div>
    </div>
</div>

<div class="form-group clearfix">
    <button type="button" id="agregar" class="btn btn-dark btn-rounded float-right">Agregar producto</button>
</div>

<div class="form-group">
    <h4 class="card-title">Detalles de venta</h4>
    <div class="table-responsive col-md-12">
        <table id="detalles" class="table table-striped">
            <thead>
                <tr>
                    <th>Eliminar</th>
                    <th>Producto</th>
                    <th>Precio de venta (PEN)</th>
                    <th>Descuento (%)</th>
                    <th>Cantidad</th>
                    <th>SubTotal (PEN)</th>
                </tr>
            </thead>
            <tfoot>                
                <tr>
                    <th colspan="4">
                        <p align="right">TOTAL A CANCELAR:</p>
                    </th>
                    <th>
                        <p align="right"><span align="right" id="total_pagar_html">PEN 0.00</span> <input type="hidden" name="total" id="total_pagar"></p>
                    </th>
                </tr>
            </tfoot>
            <tbody>
            </tbody>
        </table>
    </div>
</div>