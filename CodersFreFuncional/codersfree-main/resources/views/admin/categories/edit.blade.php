@extends('adminlte::page')

@section('title', 'Coders Free')

@section('content_header')
    <h1>Edición de categorías</h1>
@stop

@section('content')

  <div class="card">
    <div class="card-body">

      {!! Form::model($category,['route'=>['admin.categories.update', $category], 'method' => 'put']) !!}

        <div class="form-group">
          {!! Form::label('name', 'Nombre') !!}
          {!! Form::text('name', null, ['class' => 'form-control','placeholder'=>'Ingrese el nombre de la cateogoría']) !!}

          @error('name')
            <span class="text-danger" >{{$message}}</span>
          @enderror
        </div>

        {!! Form::submit('Actualizar categoria', ['class'=>'btn btn-primary']) !!}

      {!! Form::close() !!}

    </div>
  </div>

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop