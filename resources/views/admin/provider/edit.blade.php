@extends('layouts.admin')
@section('title','Edición proveedor')
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
            Editar proveedor
        </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Panel administrador</a></li>
                <li class="breadcrumb-item"><a href="{{route('providers.index')}}">Proveedores</a></li>
                <li class="breadcrumb-item activate"aria-current="page">Edición de proveedores</li>
            </ol>
        </nav>
    </div>

    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <h4 class="card-title">Edición de proveedor</h4>
                    </div>
                    {!! Form::model($provider, ['route'=>['providers.update', 
                    $provider], 'method'=>'PUT']) !!}
                        <div class="form-group">
                            <label for="name">Nombre</label>
                            <input type="text" class="form-control" name="name"
                            id="name" value="{{$provider->name}}" aria-describedby="helpId" required>
                        </div>
                        <div class="form-group">
                            <label for="email">E-mail</label>
                            <input type="email" class="form-control" name="email"
                            id="email" value="{{$provider->email}}" aria-describedby="emailHelpId" 
                            placeholder="ejemplo@gmail.com" required>
                        </div>
                        <div class="form-group">
                            <label for="ruc_number">RFC</label>
                            <input type="text" class="form-control" name="ruc_number"
                            id="ruc_number" value="{{$provider->ruc_number}}" aria-describedby="helpId" required>
                        </div>
                        <div class="form-group">
                            <label for="address">Dirección</label>
                            <input type="text" class="form-control" name="address"
                            id="address" value="{{$provider->address}}" aria-describedby="helpId" required>
                        </div>
                        <div class="form-group">
                            <label for="phone">Número de contacto</label>
                            <input type="number" class="form-control" name="phone"
                            id="phone" value="{{$provider->phone}}" aria-describedby="helpId" required>
                        </div>

                        <button type="submit" class="btn btn-primary mr-2">Registrar</button>
                        <a href="{{route('providers.index')}}" class="btn btn-light mr-2">
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
{!!Html::script('melody/js/data-table.js')!!}
@endsection