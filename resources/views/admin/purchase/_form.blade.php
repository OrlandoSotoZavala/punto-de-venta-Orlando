<div class="form-group">
    <label for="provider_id">Proveedor</label>
    <select name="provider_id" id="provider_id" class="form-control">
    @foreach($providers as $provider)
        <option value="{{$provider->id}}">{{$provider->name}}</option>
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
    @foreach($products as $product)
        <option value="{{$product->id}}">{{$product->name}}</option>
    @endforeach    
    </select>                        
</div>
<div class="form-group">
    <label for="quantity" class="form-label">Cantidad</label>
    <input type="text"
        class="form-control" name="quantity" id="quantity" aria-describedby="helpId">
</div>
    <div class="form-group">
    <label for="price" class="form-label">Precio de compra</label>
    <input type="text"
        class="form-control" name="price" id="price" aria-describedby="helpId">
</div>

<div class="form-group">
    <button type="button" id="agregar" class="btn btn-primary float-right">Agregar producto</button>
</div>

<div class="form-group">
    <h4 class="card-title">Detalles de compra</h4>
    <div class="table-responsive col-md-12">
        <table id="detalles" class="table table-striped">
            <thead>
                <tr>
                    <th>Eliminar</th>
                    <th>Producto</th>
                    <th>Precio(MXN)</th>
                    <th>Cantidad</th>
                    <th>Subtotal(MXN)</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th colspan="4">
                        <p align="right">Total:</p>
                    </th>
                    <th>
                        <p align="right"><span id="total">MXN 0.00</span></p>
                    </th>
                </tr>
                <tr id="dvOcultar">
                    <th colspan="4">
                        <p align="right">Total IMPUESTO (16%):</p>
                    </th>
                    <th>
                        <p align="right"><span id="total_impuesto">MXN 0.00</span></p>
                    </th>
                </tr>
                <tr>
                    <th colspan="4">
                        <p align="right">Total PAGAR:</p>
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