<x-instructor-layout>
  <div class="container py-8">
    <div class="card">
      <div class="card-body">
        <h1 class="text-2xl font-bold">Crear Nuevo Curso</h1>

        <hr class="mt-2 mb-6"></hr>

        {!! Form::open(['route' => 'instructor.courses.store', 'files'=> true, 'autocomplete'=>'off']) !!}

        {!! Form::hidden('user_id', auth()->user()->id) !!}

        @include('instructor.courses.partials.form')

        <div class="flex justify-end mt-6">
          {!! Form::submit('Crear curso', ['class' => 'btn btn-primary cursor-pointer']) !!}
        </div>

        {!! Form::close() !!}
      </div>
    </div>
  </div>

  <x-slot name="js">
      
    <script src="https://cdn.ckeditor.com/ckeditor5/29.1.0/classic/ckeditor.js"></script>
    <script src="{{ asset('js/instructor/courses/form.js') }}"></script>
      
  </x-slot>
</x-instructor-layout>
