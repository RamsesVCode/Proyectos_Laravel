<x-app-layout>

  <div class="card">
    <div class="card-body">
      <h1>Listado de cursos
        @if($estado==3) completos @endif
        @if($estado==1) matriculado por {{$usuario->name}} @endif
        @if($estado==2) no matriculado por {{$usuario->name}} @endif        

      </h1>
      
      <table>
        <thead>
          <th>Total Matriculados</th>
          <th>Id - Titulo curso</th>
          <th>Estudiantes</th>
        </thead>
        @foreach ($courses as $course)

          @if($estado==3 || ($estado==2 && !$course->students->contains($usuario)) || ($estado==1 && $course->students->contains($usuario)))
          
          <tr>

            <td>
              <p>{{ $course->students()->count() }}</p> 
            </td>

            <td class="mr-2">
              {{$course->id}} - {{$course->title}}
            </td>

            <td> - </td>

            @foreach ($course->students as $student)
              <td class="ml-2">{{$student->name}} - </td>                
            @endforeach  

          </tr>
          @endif
        @endforeach

      </table>
      <p class="mt-4">Cursos totales: {{$courses->count()}}</p>
    </div>
  </div>

</x-app-layout>