<div class="mt-8">
    <div class="container grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3">

      {{-- dos columnas de la izquierda para el video --}}
      <div class="lg:col-span-2 gap-8">

        <div class="embed-responsive">
          {!!$current->iframe!!}
        </div>
        
        @if(session('approved'))
          <div class="card mx-auto mt-8 text-center">
            <div class="card-body  bg-green-100 w-full">
              <div class="alert alert-success bg-green-600 text-white" role="alert">
                <strong><i class="far fa-smile"></i> Felicitaciones!</strong> {{ session('approved') }}
              </div>
            </div>
          </div>
        @endif

        <h1 class="text-3xl text-gray-600 font-bold mt-4">
          {{$current->name}}
        </h1>


        @if($current->description)
          <div class="text-gray-600">
            {{$current->description->name}}
          </div>
        @endif

        <div class="flex justify-between mt-4">

          {{-- -marcar unidad como terminada --}}
          <div class="flex items-center cursor-pointer" wire:click="completed">
            @if($current->completed)
              <i class="fas fa-toggle-on text-2xl text-blue-600"></i>
            @else
              <i class="fas fa-toggle-off text-2xl text-gray-600"></i>
            @endif
            <p class="text-sm ml-2" >Marcar esta unidad como terminada</p>
          </div>

          @if($current->resource)            
            <div class="flex items-center text-green-700 cursor-pointer" wire:click="download">
              <i class="fas fa-download text-lg "></i>
              <p class="text-sm ml-2 mr-2 font-bold">Descargar recursos</p>
            </div>

          @endif
        </div>


        <div class="card mt-2" >
          <div class="card-body flex text-gray-500 font-bold">
            @if($this->previous)
              <a wire:click="changeLesson({{ $this->previous }})" class="cursor-pointer">Tema anterior</a>
            @endif
            @if($this->next)
              <a wire:click="changeLesson({{ $this->next }})" class="cursor-pointer ml-auto">Siguiente tema</a>              
            @endif
          </div>
        </div>

      </div>

      {{-- Columna de sections y lessons de la derecha --}}
      <div class="card">
        <div class="card-body">
          <h1 class="text-2xl leading-8 text-center mb-4">{{$course->title}}</h1>

          <div class="flex items-center">
            <figure>
              <img class="w-12 h-12 object-cover rounded-full mr-4" src="{{$course->teacher->profile_photo_url}}" alt="{{$course->teacher->name}}">
            </figure>

            <div>
              <p>{{$course->teacher->name}}</p>
              <a class="text-blue-500 text-sm" href="">
                {{  '@' . Str::slug( $course->teacher->name,'' ) }}
              </a>
            </div>

          </div>
          
          <div class="relative pt-1 mt-6">
            <div class="overflow-hidden h-2 mb-1 text-xs flex rounded bg-gray-200">
              <div style="width:{{$this->advance . '%'}}" class="shadow-none flex flex-col text-center whitespace-nowrap 
                        text-white justify-center bg-blue-500 transition-all 500">
              </div>
            </div>
          </div>
          <p class="text-gray-600 text-sm mb-4">{{$this->advance . '%'}} completado</p>

          <ul>
            @foreach ($course->sections as $section)
                <li class="text-gray-600 mb-4">
                  <a class="font-bold text-base inline-block mb-2">{{ $section->name }}</a>
                  <ul>
                    @foreach ($section->lessons as $lesson)
                        <li class="flex">
                          <div>
                            @if($lesson->completed)
                              @if($current->id == $lesson->id)
                                <span class="inline-block w-4 h-4 border-4 border-yellow-300 rounded-full mr-2 mt-1"></span>
                              @else
                                <span class="inline-block w-4 h-4 bg-yellow-300 rounded-full mr-2 mt-1"></span>
                              @endif
                            @else
                              @if($current->id == $lesson->id)
                                <span class="inline-block w-4 h-4 border-4 border-gray-300 rounded-full mr-2 mt-1"></span>
                              @else
                                <span class="inline-block w-4 h-4 bg-gray-500 rounded-full mr-2 mt-1"></span>
                              @endif
                            @endif
                          </div>
                          <a class="cursor-pointer" wire:click="changeLesson({{$lesson}})">
                            {{ $lesson->name}}
                          </a>

                        </li>
                    @endforeach
                  </ul>
                </li>

            @endforeach
          </ul>

        </div>
      </div>

    </div>
</div>
