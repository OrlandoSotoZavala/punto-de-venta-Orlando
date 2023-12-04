@extends('layouts.admin')
@section('title','Registar cliente')
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
            Registro de clientes
        </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Panel administrador</a></li>
                <li class="breadcrumb-item"><a href="{{route('clients.index')}}">Clientes</a></li>
                <li class="breadcrumb-item activate"aria-current="page">Registro de clientes</li>
            </ol>
        </nav>
    </div>

    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <h4 class="card-title">Registro de clientes</h4>
                    </div>
                    {{-- 'name',
                    'ine',
                    'rfc',
                    'address',
                    'phone',
                    'email' --}}
                    {!! Form::open(['route'=>'clients.store', 'method'=>'POST']) !!}
                        <div class="form-group">
                            <label for="name">Nombre</label>
                            <input type="text" class="form-control" name="name"
                            id="name" aria-describedby="helpId">
                        </div>
                        <div class="form-group">
                            <label for="ine">INE</label>
                            <input type="text" class="form-control" name="ine"
                            id="ine" aria-describedby="helpId" required>
                        </div>
                        <div class="form-group">
                            <label for="rfc">RFC</label>
                            <input type="text" class="form-control" name="rfc"
                            id="rfc" aria-describedby="helpId">
                        </div>
                        <div class="form-group">
                            <label for="address">Dirección</label>
                            <input type="text" class="form-control" name="address"
                            id="address" aria-describedby="helpId">
                        </div>
                        <div class="form-group">
                            <label for="phone">Número telefonico</label>
                            <input type="number" class="form-control" name="phone"
                            id="phone" aria-describedby="helpId">
                        </div>
                        <div class="form-group">
                            <label for="email">Correo</label>
                            <input type="email" class="form-control" name="email"
                            id="email" placeholder="ejemplo@gmail.com" aria-describedby="helpId">
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