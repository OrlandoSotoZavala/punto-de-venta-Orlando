<div class="form-group">
    <label for="client_id">Cliente</label>
    <select name="client_id" id="client_id" class="form-control">
    @foreach($clients as $client)
        <option value="{{$client->id}}">{{$client->name}}</option>
    @endforeach    
    </select>                        
</div>

<div class="form-group">
    <label for="tax" class="form-label">Impuesto</label>
    <input type="text"
    class="form-control" name="tax" id="tax" aria-describedby="helpId" placeholder="16%">
</div>

<div class="form-group">
    <label for="product_id">Producto</label>
    <select name="product_id" id="product_id" class="form-control">
        <option value="" disabled selected>Selecciona un producto</option>
    @foreach($products as $product)
        <option value="{{$product->id}}_{{$product->stock}}_{{$product->sell_price}}">{{$product->name}}</option>
    @endforeach    
    </select>                        
</div>

<div class="form-group">
    <label for="">Stock actual</label>
    <input type="text"
        class="form-control" name="stock" id="stock" value="" disabled>
</div>

<div class="form-group">
    <label for="quantity" class="form-label">Cantidad</label>
    <input type="text"
        class="form-control" name="quantity" id="quantity" aria-describedby="helpId">
</div>

<div class="form-group">
    <label for="price" class="form-label">Precio de venta</label>
    <input type="text"
        class="form-control" name="price" id="price" aria-describedby="helpId" disabled>
</div>

<div class="form-group">
    <label for="discount" class="form-label">Descuento (%)</label>
    <input type="text"
        class="form-control" name="discount" id="discount" aria-describedby="helpId" value="0">
</div>

<div class="form-group">
    <button type="button" id="agregar" class="btn btn-primary float-right">Agregar producto</button>
</div>

<div class="form-group">
    <h4 class="card-title">Detalles de venta</h4>
    <div class="table-responsive col-md-12">
        <table id="detalles" class="table table-striped">
            <thead>
                <tr>
                    <th>Eliminar</th>
                    <th>Producto</th>
                    <th>Precio de venta (MXN)</th>
                    <th>Descuento</th>
                    <th>Cantidad</th>
                    <th>Subtotal (MXN)</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th colspan="4">
                        <p align="right">TOTAL:</p>
                    </th>
                    <th>
                        <p align="right"><span id="total">MXN 0.00</span></p>
                    </th>
                </tr>
                <tr>
                    <th colspan="4">
                        <p align="right">TOTAL IMPUESTO (16%):</p>
                    </th>
                    <th>
                        <p align="right"><span id="total_impuesto">MXN 0.00</span></p>
                    </th>
                </tr>
                <tr>
                    <th colspan="4">
                        <p align="right">TOTAL PAGAR:</p>
                    </th>
                    <th>
                        <p align="right"><span align="right" id="total_pagar_html">MXN 0.00</span>
                        <input type="hidden" name="total" id="total_pagar"></p>
                    </th>
                </tr>
            </tfoot>
            <tbody>                    
            </tbody>
        </table>
    </div>
</div>