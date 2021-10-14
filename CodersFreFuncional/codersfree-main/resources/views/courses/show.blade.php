<x-app-layout>
  <section class="bg-gray-700 mb-4 shadow-xl">
    <div class="container grid grid-cols-1 lg:grid-cols-2 gap-6">
      <figure class=" py-12">
        <img class="h-64 w-full object-cover" src="{{Storage::url($course->image->url)}}" alt="">
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
      <h1 class="font-bold text-3xl text-gray-800">Descripción</h1>
      <div class="text-gray-700 text-base">
        {!!$course->description!!}
      </div>
    </div>
  </section>

  {{-- armado de 3 columnas --}}
  <div class="container grid grid-cols-1 lg:grid-cols-3 gap-6">
    {{-- 2primeras columnas --}}
    <div class="order-2 lg:col-span-2 lg:order-1">

      {{-- Objetivos y Conocimientos previos --}}
      <section class="card mb-12">
        <div class="card-body">
          
          <ul class="grid grid-cols-1 md:grid-cols-2 gap-x-6 gap--y-2">
            <div class="mb-6 text-gray-800">
              <h1 class="font-bold text-2xl mb-2">
                <i class="far fa-list-alt mr-2"></i>
                Lo que aprenderas
              </h1>
              @foreach($course->goals as $goal)
                <li class="text-gray-700 text-sm"><i class="fas fa-check text-green-600 mr-2"></i>{{$goal->name}}</li>
              @endforeach
            </div>
            <div class="text-gray-800">
              <h1 class="font-bold text-2xl mb-2">
                <i class="fas fa-glasses mr-2"></i>
                Conocimientos previos
              </h1>
              @foreach($course->requirements as $requirement)
                <li class="text-gray-700 text-sm">
                  <i class="fas fa-check text-green-600 mr-2"></i>
                  {{$requirement->name}}
                </li>
              @endforeach
            </div>
          </ul>
        </div>
      </section>

      {{-- Temario --}}
      <section>
        <h1 class="font-bold text-3xl mb-2 text-gray-800">Temario</h1>
        @foreach($course->sections as $section)
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
        @endforeach
      </section>

      {{-- Review --}}
      @livewire('courses-reviews',['course'=> $course])

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
          
          @can('enrolled', $course )
            <a  class="btn btn-danger btn-block mt-4" href="{{route('courses.status', $course )}}">Continuar con el curso</a>
          @else
            
            @if($course->price->value == 0)

              <p class="text-2xl font-bold text-red-500 mt-3 mb-2 text-center">¡ GRATIS  !</p>

              <form action="{{route('courses.enrolled', $course)}}" method="post">
                @csrf
                <button  class="btn btn-danger btn-block mt-4" type="submit">
                  Llevar este curso
                </button>
              </form>  
            @else
              <p class="text-2xl font-bold text-gray-500 mt-3 mb-2 text-center">u$s {{$course->price->value}}</p>
              <a class="btn btn-danger btn-block mt-4" href="{{route( 'payment.checkout',$course )}}">Comprar este curso</a>
            @endif

          @endcan

        </div>
      </section>

      {{-- Cursos similares --}}
      <aside class="hidden lg:block">
        @foreach($similares as $similar)
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
        @endforeach
      </aside>

    </div>

  </div>
</x-app-layout>