@extends('adminlte::page')
@section('title', 'DarkMaster')

@section('content_header')
    <h1>Usuarios del sistema</h1>
@stop

@section('content')
    @livewire('admin.users-index')
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop