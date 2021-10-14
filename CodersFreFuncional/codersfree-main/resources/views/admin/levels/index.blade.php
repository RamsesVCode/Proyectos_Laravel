@extends('adminlte::page')

@section('title', 'Coders Free')

@section('content_header')
    <h1>Lista de niveles</h1>
@stop

@section('content')
    @if(session('info'))
      <div class="alert alert-success" role="alert">
        <strong>Felicitaciones!</strong> {{ session('info') }}
      </div>    
    @endif

    <div class="card">
      <div class="card-header text-right">
        <a class="text-success" href="{{ route( 'admin.levels.create' ) }}">
          <div><i class="fas fa-plus fa-2x"></i></div>
          Crear
        </a>
      </div>
      <div class="card-body">

        <table class="table table-striped">

          <thead>
            <tr>
              <th>ID</th>
              <th>Nombre</th>
              <th colspan="2"></th>
            </tr>
          </thead>

          <tbody>
            @foreach($levels as $level)
              <tr>
                <td>
                  {{$level->id}}
                </td>
                <td>
                  {{$level->name}}
                </td>
                <td width="10px">
                  <a class="btn btn-primary btn-sm" href="{{route('admin.levels.edit',$level)}}">
                    <i class="fas fa-edit"></i>
                  </a>
                </td>

                <td width="10px">
                  <form action="{{ route('admin.levels.destroy',$level)}}" method="POST">
                    @csrf
                    @method('delete')

                    <button type="submit" class="btn btn-danger btn-sm">
                      <i class="far fa-trash-alt"></i>
                    </button>

                  </form>
                </td>

              </tr>
            @endforeach
          </tbody>

        </table>

      </div>

      <div class="card-footer">
        {{$levels->links('vendor.pagination.bootstrap-4')}}
      </div>

    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop