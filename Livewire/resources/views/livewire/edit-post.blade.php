<div>
    <a href="#" class="btn btn-green" wire:click="$set('open',true)">
        <i class="fas fa-edit"></i>
    </a>
    <x-jet-dialog-modal wire:model="open">
        <x-slot name="title" class="">
            Editar el post {{$post->title}}
        </x-slot>
        <x-slot name="content">
            <div wire:loading wire:target="image" class="mb-4 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                <strong class="font-bold">Imagen cargando!</strong>
                <span class="block sm:inline">Espere hasta que la image se haya procesado.</span>
            </div>
            @if($image)
                <img src="{{$image->temporaryURL()}}">
            @else
                <img src="{{asset('storage/'.$post->image)}}">                
            @endif
            <div class="mb-4">
                <x-jet-label value="Título del post"/>
                <x-jet-input wire:model="post.title" type="text" name="title" class="w-full"/>
            </div>
            <div class="mb-4">
                <x-jet-label value="Contenido del post"/>
                <textarea wire:model="post.content" name="content" class="form-control w-full"></textarea>
            </div>
            <div class="mb-4">
                <x-jet-label value="Imagen del post"/>
                <input wire:model="image" type="file" name="image">
            </div>
        </x-slot>
        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$set('open',false)">
                Cancelar
            </x-jet-secondary-button>
            <x-jet-danger-button wire:click="save" wire:loading.attr="disabled" class="disabled:opacity-25">
                Actualizar Post
            </x-jet-danger-button>
        </x-slot>
    </x-jet-dialog-modal>
</div>
