@extends('adminlte::page')

@section('title', 'Coders Free')

@section('content_header')
    <h1>Lista de roles</h1>
@stop

@section('content')
  @if(session('info'))
    <div class="alert alert-primary" role="alert">
      <strong>Felicitaciones!</strong> {{ session('info') }}
    </div>
    
  @endif


    <div class="card">

      <div class="card-header text-right">
        <a class="text-success" href="{{ route( 'admin.roles.create' ) }}">
          <div><i class="fas fa-plus fa-2x"></i></div>
          Crear
        </a>
      </div>

      <div class="card body">
        <table class="table table-striped">
          <thead>
            <tr>
              <th>ID</th>
              <th>Name</th>
              <th colspan="2"></th>
            </tr>
          </thead>
          <tbody>
            @forelse($roles as $role)
              <tr>
                <td>{{$role->id}}</td>
                <td>{{$role->name}}</td>

                <td width="10px">
                  <a class="btn btn-primary  btn-sm" href="{{route('admin.roles.edit', $role)}}">
                    <i class="fas fa-edit"></i>                    
                  </a>
                </td>

                <td width="10px">
                  <form action="{{ route( 'admin.roles.destroy',$role ) }}" method="POST">
                    @method('delete')
                    @csrf
                    <button class="btn btn-danger  btn-sm" type="submit" >
                      <i class="far fa-trash-alt"></i>                      
                    </button>
                  </form>
                </td>

              </tr>
      
            @empty
              
              <tr>
                <td colspan='4'> No hay ningun rol registrado</td>
              </tr>

            @endforelse

          </tbody>

        </table>

      </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop