@extends('layouts.admin')
@section('title','Editar categoria')
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
            Editar categoria
        </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Panel administrador</a></li>
                <li class="breadcrumb-item"><a href="{{route('categories.index')}}">Categorías</a></li>
                <li class="breadcrumb-item activate"aria-current="page">Editar categoría</li>
            </ol>
        </nav>
    </div>

    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <h4 class="card-title">Registro de categorías</h4>
                    </div>
                    {!! Form::model($category,['route'=>['categories.update',$category], 'method'=>'PUT']) !!}
                    <div class="form-group">
                        <label for="">Nombre</label>
                        <input type="text" name="name" id="name" value="{{$category->name}}" class="form-control" placeholder="Nombre" required>
                    </div>
                    <div class="mb-3">
                      <label for="description">Descipción</label>
                      <textarea class="form-control" name="description" id="description"  rows="3">{{$category->description}}</textarea>
                    </div>

                    <button type="submit" class="btn btn-primary mr-2">Registrar</button>
                    <a href="{{route('categories.index')}}" class="btn btn-light mr-2">
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