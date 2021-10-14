<x-app-layout>
  <section class="bg-gray-700 mb-4 shadow-xl">
    <div class="container grid grid-cols-1 lg:grid-cols-2 gap-6">
      <figure class=" py-12">
        @isset($course->image)
          <img class="h-64 w-full object-cover" src="{{Storage::url($course->image->url)}}" alt="">
        @else
          <img class="h-64 w-full object-cover" src="{{asset('img/cursos/default-cursos.jpg')}}" alt="">
        @endisset
      </figure>
      <div class="text-white py-10">
        <h1 class="text-4xl">{{$course->title}}</h1>
        <h2 class="text-xl mb-2">{{$course->subtitle}}</h2>

        <p class="mb-2"><i class="fas fa-chart-line"></i> Nivel:{{$course->level->name}}</p>
        <p class="mb-2"><i class="fas fa-"></i> Categoria: {{$course->category->name}}</p>
        <p class="mb-2"><i class="fas fa-users"></i> Matriculados: {{$course->students_count}}</p>
        <p class="mb-2"><i class="fas fa-star"></i> Calificación: {{$course->rating}}</p>
        <p><i class="fas fa-cogs text-sm mr-2"></i> Estado: Publicado</p>
        
      </div>

    </div>
  </section>
  {{-- Descripci{on del curso} --}}
  <section class="card mb-6 shadow-xl">
    <div class="card-body">
      <h1 class="font-bold text-3xl">Descripción</h1>
      <div class="text-gray-700 text-base">
        {!! $course->description !!}
      </div>
    </div>
  </section>

  {{-- armado de 3 columnas --}}
  <div class="container grid grid-cols-1 lg:grid-cols-3 gap-6">
    {{-- aviso de seccion --}}
    @if(session('info'))
      <div class="lg:col-span-3" x-data="{open: true}" x-show="open">
        <div class="relative py-3 pl-4 pr-10 leading-normal text-red-700 bg-red-100 rounded-lg" role="alert">
          <p><strong>¡¡ Ocurrió un error !!</strong> {{session('info')}}</p>
          <span class="absolute inset-y-0 right-0 flex items-center mr-4">
            <svg x-on:click="open=false" class="w-4 h-4 fill-current" role="button" viewBox="0 0 20 20"><path d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd" fill-rule="evenodd"></path></svg>
          </span>
        </div>
      </div>
    @endif

    {{-- 2primeras columnas --}}
    <div class="order-2 lg:col-span-2 lg:order-1">

      {{-- Objetivos y Conocimientos previos --}}
      <section class="card mb-12">
        <div class="card-body">
          
          <ul class="grid grid-cols-1 md:grid-cols-2 gap-x-6 gap--y-2">
            <div class="mb-6">
              <h1 class="font-bold text-2xl mb-2">
                <i class="far fa-list-alt mr-2"></i>
                Lo que aprenderas
              </h1>

              @forelse($course->goals as $goal)
                <li class="text-gray-700 text-sm">
                  <i class="fas fa-check text-green-600 mr-2">
                    </i>{{$goal->name}}
                  </li>
              @empty
                <li class="text-gray-700 text-sm">
                  <i class="fas fa-exclamation-triangle text-red-500 mr-2"></i>
                  Aún no se han definido metas.
                </li>
              @endforelse

            </div>
            <div>
              <h1 class="font-bold text-2xl mb-2">
                <i class="fas fa-glasses mr-2"></i>
                Conocimientos previos
              </h1>
              @forelse($course->requirements as $requirement)
                <li class="text-gray-700 text-sm">
                  <i class="fas fa-check text-green-600 mr-2"></i>
                  {{$requirement->name}}
                </li>
              @empty
                <li class="text-gray-700 text-sm">
                  <i class="fas fa-exclamation-triangle text-red-500 mr-2"></i>
                  Aún no se han definido conocimientos previos.
                </li>
              @endforelse
            </div>
          </ul>
        </div>
      </section>

      {{-- Temario --}}
      <section>
        <h1 class="font-bold text-3xl mb-2">Temario</h1>
        @forelse($course->sections as $section)
          <article class="mb-4 shadow"
          @if($loop->first)
            x-data="{open: true }">
          @else
            x-data="{open: false }">
          @endif

            <header class="border border-gray-300 px-4 py-2 cursor-pointer bg-gray-200"
              x-on:click="open = !open">
              <h1 class="font-bold text-lg text-gray-600">{{$section->name}}</h1>
            </header>

            <div class="bg-white py-2 px-4" x-show="open">
              <ul class="grid grid-cols-1 gap-2">
                @foreach($section->lessons as $lesson)
                  <li class="text-gray-700 text-base">
                    <i  class="fas fa-play-circle mr-2 text-gray-600"></i>
                    {{$lesson->name}}
                  </li>
                @endforeach
              </ul>

            </div>
          </article>
        @empty
          <article class="card">
            <div class="card-body">
              <i class="fas fa-exclamation-triangle text-red-500 mr-2"></i>
              No se ha definido aún el temario de este curso.

            </div>
          </article>          
        @endforelse
      </section>


    </div>

    {{-- Columna de la derecha --}}
    <div class="order-1 lg:order-2">
      {{-- Tarjeta del profesor --}}
      <section class="card mb-4">
        <div class="card-body">

          <div class="flex items-center">
            <img class="h-12 w-12 object-cover rounded-full shadow-lg" src="{{$course->teacher->profile_photo_url}}" 
                  alt="{{$course->teacher->name}}">
            <div class="ml-4"> 
              <h1 class="font-bold text-gray-500 text-lg">
                Prof. {{$course->teacher->name}}
              </h1>
              <a class="text-blue-400 text-sm font-bold item-center" href="">{{'@'.Str::slug($course->teacher->name, '')}}</a>
            </div>
          </div>
          

          <form action="{{route('admin.courses.approved', $course)}}" method="post">
            @csrf
            <button  class="btn btn-primary btn-block mt-4" type="submit">
              Aprobar publicación del curso
            </button>
          </form>

          <a class="btn btn-danger btn-block mt-4" href="{{ route('admin.courses.observation',$course) }}">Observar curso</a>


        </div>
      </section>

      {{-- Cursos similares --}}
      <aside class="hidden lg:block">
        {{-- @foreach($similares as $similar)
          <article class="flex mb-6">
            <img class="h-32 w-40 object-cover" src="{{Storage::url($similar->image->url)}}" alt="">
            
            <div class="ml-3">
              <h1>
                <a class="font-bold text-gray-500 mb-3" href="{{route('courses.show',$similar)}}">
                  {{Str::limit($similar->title,40)}}
                </a>
              </h1>

              <div class="flex items-center mb-2">
                <img class="h-8 w-8 object-cover rounded-full shadow-lg" src="{{$similar->teacher->profile_photo_url}}" alt="">
                <p class="text-gray-700 text-sm ml-2" >{{$similar->teacher->name}}</p>
              </div>

              <p class="text-sm">
                <i class="fas fa-star mr-2 text-yellow-400"></i>
                {{$similar->rating}}
              </p>

            </div>

          </article>
        @endforeach --}}
      </aside>

    </div>

  </div>
</x-app-layout>