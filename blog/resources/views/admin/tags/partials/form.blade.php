<div class="mb-4">
    {!! Form::label('name', 'Nombre:', ['class'=>'form-labe']) !!}
    {!! Form::text('name', null, ['class'=>'form-control','placeholder'=>'Ingresar nombre de etiqueta']) !!}
</div>
@error('name')
    <small class="text-danger">{{$message}}</small>
@enderror
<div class="mb-4">
    {!! Form::label('slug', 'Slug:', ['class'=>'form-labe']) !!}
    {!! Form::text('slug', null, ['class'=>'form-control','readonly','placeholder'=>'Nombre de Slug']) !!}
</div>
@error('slug')
    <small class="text-danger">{{$message}}</small>
@enderror
<div class="mb-4">
    {!! Form::label('color', 'Color:', ['class'=>'form-labe']) !!}
    {!! Form::select('color', $colors, null, ['class'=>'form-control']) !!}
</div>
@error('color')
    <small class="text-danger">{{$message}}</small>
@enderror