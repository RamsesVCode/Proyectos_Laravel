@extends('adminlte::page')

@section('title', 'Coders Free')

@section('content_header')
    <h1>Edición de precios</h1>
@stop

@section('content')

  <div class="card">
    <div class="card-body">

      {!! Form::model($price,['route'=>['admin.prices.update', $price], 'method' => 'put']) !!}

        <div class="form-group">
          {!! Form::label('name', 'Nombre') !!}
          {!! Form::text('name', null, ['class' => 'form-control','placeholder'=>'Ingrese el nombre del precio']) !!}

          @error('name')
            <span class="text-danger" >{{$message}}</span>
          @enderror
        </div>

        <div class="form-group">
          {!! Form::label('value', 'Valor') !!}
          {!! Form::text('value', null, ['class' => 'form-control','placeholder'=>'Ingrese el precio']) !!}

          @error('value')
            <span class="text-danger" >{{$message}}</span>
          @enderror
        </div>

        {!! Form::submit('Actualizar precio', ['class'=>'btn btn-primary']) !!}

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