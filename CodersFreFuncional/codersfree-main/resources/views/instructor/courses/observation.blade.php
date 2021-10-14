<x-instructor-layout :course="$course">
  <h1 class="text-2xl font-bold">Obsevaciones del curso</h1>
  <hr class="mt-2 mb-6">
  
  <div class="text-gray-500">
    {!!$course->observation->body !!}
  </div>
 
  <x-slot name="js">
    
    <script src="https://cdn.ckeditor.com/ckeditor5/29.1.0/classic/ckeditor.js"></script>
    <script src="{{asset('js/instructor/courses/form.js')}}"></script>

  </x-slot>
</x-instructor-layout>