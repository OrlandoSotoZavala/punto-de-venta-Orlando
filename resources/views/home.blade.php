{{-- @extends('layouts.app') --}}
@extends('layouts/admin')

@section('content')
<div class="container">
    
    <div class="row justify-content-center">
        <div class="col-md-8">
            <br><br>
            <div class="card">
                <div class="card-header">{{ __('Panel administrador') }}</div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="row justify-content-center">
                        <div class="col-md-6">
                            <div class="border-bottom py-4">
                                <div class="list-group">
                                    <a class="btn btn-primary btn-block" href="{{route('categories.index')}}">Categorías</a><br>
                                    <a class="btn btn-primary btn-block" href="{{route('clients.index')}}">Clientes</a><br>
                                    <a class="btn btn-primary btn-block" href="{{route('purchases.index')}}">Compras</a><br>
                                    <a class="btn btn-primary btn-block" href="{{route('products.index')}}">Productos</a><br>
                                    <a class="btn btn-primary btn-block" href="{{route('providers.index')}}">Proveedores</a><br>
                                    <a class="btn btn-primary btn-block" href="{{route('sales.index')}}">Ventas</a><br>

                                </div>
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
