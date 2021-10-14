<div class="mb-4">
    {!! Form::label('name', 'Nombre:', null) !!}
    {!! Form::text('name', null, ['class'=>'form-control','placeholder'=>'Ingrese el nombre del rol']) !!}
    @error('name')
        <small class="text-danger">{{$message}}</small>
    @enderror
</div>
<div class="mb-4">
    {!! Form::label('permisos', 'Lista de permisos',null) !!}
    @foreach ($permissions as $permission)
        <br>{!! Form::checkbox('permissions[]', $permission->id, null, ['class'=>'mr-2']) !!}
        {{$permission->description}}
    @endforeach
    @error('permissions')
        <small class="text-danger">{{$message}}</small>
    @enderror
</div>
