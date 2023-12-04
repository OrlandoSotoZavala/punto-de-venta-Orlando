@extends('layouts.admin')
@section('title', 'Información del cliente ')
@section('styles')

@endsection

@section('create')

@endsection

@section('options')

@endsection

@section('preference')

@endsection

@section('content')
<div class="content-wrapper">
    <div class="page-header">
        <h3 class="page-title">
            Información del cliente
        </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Panel Administrador</a></li>
                <li class="breadcrumb-item"><a href="{{route('clients.index')}}">Clientes</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{$client->name}}</li>
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
                                <h3>{{$client->name}}</h3>
                                <div class="d-flex justify-content-between">
                                </div>
                            </div>
                            <div class="border-bottom py-4">
                                <div class="lis-group">
                                    <button type="button" class="list-group-item
                                     list-group-item-action active">
                                        Sobre cliente
                                    </button>
                                    <button type="button" 
                                    class="list-group-item list-group-item-action">
                                        Compras
                                    </button>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-8 pl-lg-5">
                            <div class="d-flex justify-content-between">
                                <div>
                                    <h4>Información del cliente</h4>
                                </div>
                            </div>
                            <div class="profile-feed">
                                <div class="d-flex align-items-start profile-feed-item">
                                    {{-- 'name',
                                    'ine',
                                    'rfc',
                                    'address',
                                    'phone',
                                    'email' --}}
                                    <div class="form-group col-md-6">
                                        <strong>
                                            Nombre
                                        </strong>
                                        <p class="text-muted">{{$client->name}}</p>
                                        <hr>                                        
                                        <strong>
                                            INE
                                        </strong>
                                        <p class="text-muted">{{$client->ine}}</p>
                                        <hr>   
                                        <strong>
                                            RFC
                                        </strong>
                                        <p class="text-muted">{{$client->rfc}}</p>
                                        <hr>                                                                                                                                            
                                    </div>
                                    <div class="form-group col-md-6">
                                        <strong>
                                            Dirección
                                        </strong>
                                        <p class="text-muted">{{$client->address}}</p>
                                        <hr> 
                                        <strong>
                                            Número telefonico
                                        </strong>
                                        <p class="text-muted">{{$client->phone}}</p>
                                        <hr>                                        
                                    
                                        <strong>
                                            Correo electrónico
                                        </strong>
                                        <p class="text-muted">{{$client->email}}</p>
                                        <hr>                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer text-muted">
                    <a class="btn btn-primary float-right" href="{{route('clients.index')}}">
                        Regresar
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection