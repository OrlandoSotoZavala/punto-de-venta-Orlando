@extends('layouts.admin')
@section('title','Registro de ventas')
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
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Panel administrador</a></li>
                <li class="breadcrumb-item"><a href="{{route('sales.index')}}">Compras</a></li>
                <li class="breadcrumb-item activate"aria-current="page">Registro de ventas</li>
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
                    @include('admin.sale._form')
                </div>
                <div class="card-footer text-muted">
                    <button type="submit" id="guardar" class="btn btn-success float-right">Registrar</button>
                    <a href="{{route('sales.index')}}" class="btn btn-light mr-2">
                        Cancelar
                    </a>                    
                
                
                {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>    
@endsection
@section('scripts')
{!!Html::script('melody/js/alerts.js')!!}
{!!Html::script('melody/js/avgrund.js')!!}
<script>
    $(document).ready(function() {
        $("#agregar").click(function() {
            agregar();
        });
    });

    var cont = 1;
    total = 0;
    subtotal = [];

    $("#guardar").hide();
    $("#product_id").change(mostrarValores);
    function mostrarValores(){
        datosProducto = document.getElementById('product_id').value.split('_');
        $("#price").val(datosProducto[2]);
        $("#stock").val(datosProducto[1]);
    }
    function agregar() {
        datosProducto = document.getElementById('product_id').value.split('_');

        product_id = datosProducto[0];
        producto = $("#product_id option:selected").text();
        quantity = $("#quantity").val();
        discount = $("#discount").val();
        price = $("#price").val();
        stock = $("#stock").val();
        impuesto = $("#tax").val();

        if (product_id != "" && quantity != "" && quantity > 0 && price != ""){
            if (parseInt(stock) >= parseInt(quantity)){
                subtotal[cont] = (quantity * price) - (quantity * price * discount / 100);
                total = total + subtotal[cont];
                var fila = '<tr class="selected" id="fila' + cont +'"><td><button type="button" class="btn btn-danger btn-sm" onclick="eliminar('+ cont + ');"><i class="fa fa-times"></i></button></td><td><input type="hidden" name="product_id[]" value="'+ product_id +'">' + producto + '</td><td><input type="hidden" id="price[]" name="price[]" value="'+ parseFloat(price).toFixed(2) +'"> <input class="form-control" type="number" id="price[]" value="' + parseFloat(price).toFixed(2) + '" disabled></td><td><input type="hidden" name="discount[]" value="'+ parseFloat(discount)+'"><input class="form-control" type="number" value="'+ parseFloat(discount) +'" disabled></td><td><input type="hidden" name="quantity[]" value="'+ quantity +'"><input class="form-control" type="number" value="'+ quantity +'" disabled></td><td align="right">s/' + parseFloat(subtotal[cont]).toFixed(2) + '</td></tr>';
                cont++;
                limpiar();
                totales();
                evaluar();
                $('#detalles').append(fila);
            }else {
                Swal.fire({
                    type: 'error',
                    type: 'La cantidad a vender supera el stock'
                })
            }
        }else {
            Swal.fire({
                type: 'error',
                text: 'Rellene todos los campos del detalle de la venta'
            })
        }
    }

    function limpiar() {
        $("#quantity").val("");
        $("#discount").val("0");
        $("#price").val("");
    }

    function totales(){
        $("#total").html("MXN "+total.toFixed(2));

        total_impuesto = total * impuesto / 100;
        total_pagar = total + total_impuesto;
        $("#total_impuesto").html("MXN" + total_impuesto.toFixed(2));
        $("#total_pagar_html").html("MXN" + total_pagar.toFixed(2));
        $("#total_pagar").val(total_pagar.toFixed(2));
    }

    function evaluar(){
        if(total > 0){
            $("#guardar").show();
        }else{
            $("#guardar").hide();
        }
    }

    function eliminar(index){
        total = total - subtotal[index];
        total_impuesto = total - impuesto / 100;
        total_pagar_html = total + total_impuesto;
        $("#total").html("MXN" + total);
        $("#total_impuesto").html("MXN" + total_impuesto);
        $("#total_pagar_html").html("MXN" + total_pagar_html);
        $("#total_pagar").val(total_pagar_html.toFixed(2));
        $("#fila" + index).remove();
        evaluar();
    }
</script>
@endsection 