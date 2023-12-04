@extends('layouts.admin')
@section('title', 'Información del producto ')
@section('styles')

@endsection

@section('create')
<li class="nav-item d-none d-lg-flex">
    <a class="nav-link" href="{{route('products.create')}}">
        <span class="btn btn-primary">+ Crear nuevo</span>
    </a>
</li>
@endsection

@section('options')

@endsection

@section('preference')

@endsection

@section('content')
<div class="content-wrapper">
    <div class="page-header">
        <h3 class="page-title">
            {{$product->name}}
        </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Panel Administrador</a></li>
                <li class="breadcrumb-item"><a href="{{route('products.index')}}">Productos</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{$product->name}}</li>
            </ol>
        </nav>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="border-bottom text-center pb-4">
                                <img src="{{asset('image/'.$product->image)}}" 
                                alt="producto" class="img-lg mb-3">
                                <h3>{{$product->name}}</h3>
                                <div class="d-flex justify-content-between">
                                </div>
                            </div>
                            <div class="border-bottom py-4">
                                <div class="list-group">
                                    @if ($product->status == 'ACTIVE')
                                        <button class="btn btn-success btn-block">{{$product->status}}</button>
                                    @else
                                    <button class="btn btn-danger btn-block">{{$product->status}}</button>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-8 pl-lg-5">
                            <div class="d-flex justify-content-between">
                                <div>
                                    <h4>Información del producto</h4>
                                </div>
                            </div>
                            <div class="profile-feed">
                                <div class="d-flex align-items-start profile-feed-item">

                                    <div class="form-group col-md-6">
                                        <strong>
                                            Código
                                        </strong>
                                        <p class="text-muted">{{$product->code}}</p>
                                        <hr>                                        
                                        <strong>
                                            Nombre
                                        </strong>
                                        <p class="text-muted">{{$product->name}}</p>
                                        <hr>   
                                        <strong>
                                            Stock
                                        </strong>
                                        <p class="text-muted">{{$product->stock}}</p>
                                        <hr>
                                        <strong>
                                            Precio de venta
                                        </strong>
                                        <p class="text-muted">{{$product->sell_price}}</p>
                                        <hr>                                                                                                     
                                    </div>

                                    <div class="form-group col-md-6">
                                        <strong>
                                            Descripción
                                        </strong>
                                        <p class="text-muted">{{$product->short_description}}</p>
                                        <hr>
                                        <strong>
                                            Categoría
                                        </strong>
                                        <a href="{{route('categories.show', $product->category->id)}}">
                                            <p class="text-muted">{{$product->category->name}}</p>
                                        </a>
                                        
                                        <hr>
                                        <strong>
                                            Proveedor
                                        </strong>
                                        <a href="{{route('providers.show', $product->provider->id)}}">
                                            <p class="text-muted">{{$product->provider->name}}</p>
                                        </a>                                        
                                        <hr>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer text-muted">
                    <a class="btn btn-primary float-right" href="{{route('products.index')}}">
                        Regresar
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection