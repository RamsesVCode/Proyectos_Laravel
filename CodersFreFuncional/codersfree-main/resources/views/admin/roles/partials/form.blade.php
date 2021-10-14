 <div class="form-group">
   {!! Form::label('name', 'Nombre:') !!}
   {!! Form::text('name', null, ['class' => 'form-control'.($errors->has('name') ? ' is-invalid' : '') , 'placeholder' => 'Escriba un nombre']) !!}
   @error('name')
   <span class="invalid-feedback">
     <strong>{{ $message }}</strong>
   </span>
   @enderror
 </div>

 <p><strong>Permisos</strong></p>

 @foreach ($permissions as $permission)
 <div>
   <label>
     {!! Form::checkbox('permissions[]', $permission->id, null, ['class' => 'mr-1']) !!}
     {{$permission->name}}
   </label>
 </div>
 @endforeach

 @error('permissions')
 <small class="text-danger">
   <strong>{{ $message }}</strong>
   <br>
 </small>
 <br>
 @enderror