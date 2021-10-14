@props(['post'])

<article class="mb-8 bg-white shadow-lg rounded-lg overflow-hidden">
    <img class="w-full h-72 object-cover object-center" src="@if($post->image) {{Storage::url($post->image->url)}} @else https://cdn.pixabay.com/photo/2019/03/09/21/30/downtown-4045036_960_720.jpg @endif">
    
    <div class="px-6 py-4">
        <h1 class="font-bold text-xl mb-2">
            <a href="{{route('posts.show',$post)}}">{{$post->name}}</a>
        </h1>
        <div class="text-gray-700 text-base">
            {!!$post->extract!!}
        </div>
    </div>
    
    <div class="px-6 pt-2 pb-2">
        @foreach ($post->tags as $tag)
            <a class="inline-block bg-{{$tag->color}}-200 rounded-full px-3 py-1 text-sm mr-2 text-gray-700" href="{{route('posts.tag',$tag)}}">{{$tag->name}}</a>
        @endforeach
    </div>
</article>