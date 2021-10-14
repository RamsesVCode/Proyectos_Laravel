@extends('adminlte::page')

@section('title', 'Coders Free')

@section('content_header')
    <h1>Observaciones al curso: {{$course->title}}</h1>
@stop

@section('content')

<div class="card">
    {!! Form::open(['route' => ['admin.courses.reject', $course]]) !!}

      <div class="form-group">
        {!! Form::label('body','Observaciones al curso') !!}
        {!! Form::textarea('body',  null) !!}

        @error('body')
          <strong class="text-danger">{{$message}}</strong>
        @enderror
      </div>

      {!! Form::submit('Rechazar el curso', ['class' =>'btn btn-danger']) !!}

    {!! Form::close() !!}
  </div>

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script src="https://cdn.ckeditor.com/ckeditor5/29.2.0/classic/ckeditor.js"></script>

    <script>
      ClassicEditor
        .create( document.querySelector( '#body' ) )
        .then( editor => {
                console.log( editor );
        } )
        .catch( error => {
                console.error( error );
        } );
    </script>

@stop