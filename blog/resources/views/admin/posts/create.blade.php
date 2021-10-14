@extends('adminlte::page')
@section('title', 'DarkMaster')

@section('content_header')
    <h1>Crear nuevo post</h1>
@stop

@section('content')
    {!! Form::open(['route'=>'admin.posts.store','method'=>'post','files'=>true]) !!}
    @include('admin.posts.partials.form')
    {!! Form::submit('Guardar', ['class'=>'btn btn-primary']) !!}
    {!! Form::close() !!}
@stop
@section('css')
    <style>
        #picture{
            display: block;
            width: 90%;
            max-height: 250px;
            object-fit: cover;
            margin:0 auto !important;
        }
    </style>    
@stop
@section('js')
    <script src="{{asset('vendor/jQuery-Plugin-stringToSlug-1.3/jquery.stringToSlug.min.js')}}"></script>
    <script src="https://cdn.ckeditor.com/ckeditor5/29.2.0/classic/ckeditor.js"></script>
    <script>
        $(document).ready( function() {
        $("#name").stringToSlug({
            setEvents: 'keyup keydown blur',
            getPut: '#slug',
            space: '-'
        });
        });

        ClassicEditor
        .create( document.querySelector('#extract') )
        .catch( error => {
            console.error( error );
        } );
        ClassicEditor
        .create( document.querySelector('#body') )
        .catch( error => {
            console.error( error );
        } );

        document.getElementById("file").addEventListener("change",(event)=>{
            var file = event.target.files[0];
            document.getElementById("pre").innerHTML = `Nombre: ${file.name}\nTamaño: ${file.size/1024} KB`;
            var reader = new FileReader();
            reader.readAsDataURL(file);
            reader.onload = (event)=>{
                document.getElementById("picture").src=event.target.result;
            };
        });
    </script>
@endsection