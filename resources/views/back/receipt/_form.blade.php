<div class="form-row">
    <div class="form-group col-md-6">
        <label for="supplier_id">Proveedor</label>
        <select name="supplier_id" id="supplier_id" class="form-control">
            <option value="" id="reset" disabled selected>--- Seleccione un proveedor ---</option>
            @foreach ($suppliers as $supplier)
                <option value="{{$supplier->id}}">{{$supplier->name}}</option>
            @endforeach
        </select>
    </div>

    <div class="form-group col-md-6">
        <label for="product_id">Producto</label>
        <select name="product_id" id="product_id" class="form-control">
            <option value="" id="reset" disabled selected>--- Seleccione un producto ---</option>
            @foreach ($products as $product)
                @if ($product->status == "ACTIVATE")
                    <option value="{{$product->id}}">{{$product->name}}</option>
                @endif
            @endforeach
        </select>
    </div>
</div>

<div class="row">
    <div class="form-group col-md-6" >
        <div id="icon_div">
            <label for="quantity">Cantidad</label>
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon3"><i class="fas fa-archive"></i></span>
                </div>
                <input type="number" name="quantity" id="quantity" class="form-control" placeholder="0">
            </div>
        </div>
    </div>

    <div class="form-group col-md-6" >
        <div id="icon_div">
            <label for="price">Precio de compra</label>
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon3">s/</span>
                </div>
                <input type="number" name="price" id="price" class="form-control" placeholder="0">
            </div>
        </div>
    </div>
</div>

<div class="form-group clearfix" >
    <button type="button" id="agregar" class="btn btn-primary float-right">
        Agregar producto
    </button>
</div>

<div class="form-group">
    <h4 class="card-title">Detalles de compra</h4>
    <div class="table-responsive col-md-12">
        <table id="detalles" class="table table-striped">
            <thead>
                <tr>
                    <th>Eliminar</th>
                    <th>Producto</th>
                    <th>Precio (PEN)</th>
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