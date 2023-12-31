@extends('layouts.admin')

@section('title','Gestion de categorias')

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
            Prueba
        </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Panel de administración</a></li>
                <li class="breadcrumb-item activate"aria-current="page">Prueba</li>
            </ol>
        </nav>
    </div>

    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <h4 class="card-title">Prueba</h4>
                        <!-- <i class="fas fa-ellipsis-v"></i> -->
                        <div class="btn-group">
                            <a data-toggle="dropdown" aria-haspopup="true"
                            aria-expanded="false">
                                <i class="fas fa-ellipsis-v"></i> 
                            </a>
                            <div class="dropdown-menu dropdown-menu-right">
                                <a href="{{route('categories.create')}}" class="dropdown-item">Agregar</a>
                                <!-- <a class="dropdown-item" href="#">Another action</a>
                                <a class="dropdown-item" href="#">Something else here</a> -->
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table id="order-listing" class="table">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Nombre</th>
                                    <th>Descripción</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                {{-- @foreach ($categories as $category)
                                <tr>
                                    <th scope="row">{{$category->id}}</th>
                                    <td>
                                        <a href="{{route('categories.show', $category)}}">
                                            {{$category->name}}</a>
                                    </td>
                                    <td>{{$category->description}}</td>
                                    <td style="width: 50px;">
                                        {!! Form::open(['route'=>['categories.destroy',
                                            $category], 'method'=>'DELETE']) !!}

                                        <a class="jsgrid-button jsgrid-edit-button" href="
                                        {{route('categories.edit', $category)}}"
                                        title="Editar">
                                            <i class="far fa-edit"></i>
                                        </a>
                                        <a class="jsgrid-button jsgrid-delete-button"href="
                                        {{route('categories.destroy', $category)}}"
                                        type="submit"title="Eliminar">
                                            <i class="far fa-trash-alt"></i>
                                        </a>
                                        
                                        {!! Form::close() !!}
                                    </td>
                                </tr>
                                @endforeach --}}
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>    
@endsection
@section('scripts')
{!!Html::script('melody/js/data-table.js')!!}
@endsection