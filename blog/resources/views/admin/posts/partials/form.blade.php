<div class="mb-4">
    {!! Form::label('name', 'Nombre: ', ['class'=>'form-label']) !!}
    {!! Form::text('name', null, ['class'=>'form-control','placeholder'=>'Ingrese el nombre del post','autocomplete'=>'off']) !!}
    @error('name')
        <small class="text-danger">{{$message}}</small>
    @enderror
</div>
<div class="mb-4">
    {!! Form::label('slug', 'Slug: ', ['class'=>'form-label']) !!}
    {!! Form::text('slug', null, ['class'=>'form-control','placeholder'=>'Ingrese el slug del post','readonly']) !!}
    @error('slug')
        <small class="text-danger">{{$message}}</small>
    @enderror
</div>
<div class="mb-4">
    {!! Form::label('category_id', 'Categoria: ', ['class'=>'form-label']) !!}
    {!! Form::select('category_id', $categories, null, ['class'=>'form-control']) !!}
    @error('category_id')
        <small class="text-danger">{{$message}}</small>
    @enderror
</div>
<div class="mb-4">
    <p class="font-weight-bold">Etiquetas</p>
    @foreach ($tags as $tag)
        <label class="mr-2">
        {!! Form::checkbox('tags[]', $tag->id, null,null) !!}
        {{$tag->name}}
        </label>
    @endforeach
    @error('tags')
        <small class="text-danger">{{$message}}</small>
    @enderror
</div>
<div class="mb-4">
    <p>Estado</p>
    <label for="">
        {!! Form::radio('status', 1, true) !!}
        Borrador
    </label>
    <label for="">
        {!! Form::radio('status', 2, false) !!}
        Publicado
    </label>
    @error('status')
        <small class="text-danger">{{$message}}</small>
    @enderror
</div>
{{-- IMAGEN --}}
<div class="row mb-4">
    <div class="col">
        @isset($post->image)
        <img id="picture" src="{{Storage::url($post->image->url)}}" class="img-fluid">            
        @else
            <img id="picture" src="https://cdn.pixabay.com/photo/2019/03/09/21/30/downtown-4045036_960_720.jpg" class="img-fluid">
        @endif
    </div>
    <div class="col">
        <div class="mb-3">
            {!! Form::label('file', 'Image de Post') !!}
            {!! Form::file('file', ['class'=>'form-control-file','accept'=>'image/*']) !!}
            @error('file')
                <small class="text-danger">{{$message}}</small>
            @enderror
            <p>
               <pre id="pre">
                </pre> 
            </p>
        </div>
    </div>
</div>
<div class="mb-4">
    {!! Form::label('extract', 'Extracto: ', ['class'=>'form-label']) !!}
    {!! Form::textarea('extract', null, ['class'=>'form-control']) !!}
    @error('extract')
        <small class="text-danger">{{$message}}</small>
    @enderror
</div>
<div class="mb-4">
    {!! Form::label('body', 'Cuerpo del post: ', ['class'=>'form-label']) !!}
    {!! Form::textarea('body', null, ['class'=>'form-control']) !!}
    @error('body')
        <small class="text-danger">{{$message}}</small>
    @enderror
</div>