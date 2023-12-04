@extends('layouts.admin')
@section('title','Editar cliente')
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
            Edición de clientes
        </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Panel administrador</a></li>
                <li class="breadcrumb-item"><a href="{{route('clients.index')}}">Clientes</a></li>
                <li class="breadcrumb-item activate"aria-current="page">Edición de clientes</li>
            </ol>
        </nav>
    </div>

    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <h4 class="card-title">Edición de clientes</h4>
                    </div>
                    {{-- 'name',
                    'ine',
                    'rfc',
                    'address',
                    'phone',
                    'email' --}}
                    {!! Form::model($client, ['route'=>['clients.update', $client], 'method'=> 'PUT', 
                    'files'=>true]) !!}
                        <div class="form-group">
                            <label for="name">Nombre</label>
                            <input type="text" class="form-control" name="name"
                            id="name" value="{{$client->name}}" aria-describedby="helpId" required>
                        </div>
                        <div class="form-group">
                            <label for="ine">INE</label>
                            <input type="text" class="form-control" name="ine"
                            id="ine" value="{{$client->ine}}" aria-describedby="helpId" required>
                        </div>
                        <div class="form-group">
                            <label for="rfc">RFC</label>
                            <input type="text" class="form-control" name="rfc"
                            id="rfc" value="{{$client->rfc}}" aria-describedby="helpId" required>
                        </div>
                        <div class="form-group">
                            <label for="address">Dirección</label>
                            <input type="text" class="form-control" name="address"
                            id="address" value="{{$client->address}}" aria-describedby="helpId">
                        </div>
                        <div class="form-group">
                            <label for="phone">Número telefonico</label>
                            <input type="number" class="form-control" name="phone"
                            id="phone" value="{{$client->phone}}" aria-describedby="helpId">
                        </div>
                        <div class="form-group">
                            <label for="email">Correo electrónico</label>
                            <input type="email" class="form-control" name="email"
                            id="email" value="{{$client->email}}" aria-describedby="helpId">
                        </div>
                        
                        <button type="submit" class="btn btn-primary mr-2">Registrar</button>
                        <a href="{{route('clients.index')}}" class="btn btn-light mr-2">
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
{!!Html::script('melody/js/dropify.js')!!}
@endsection