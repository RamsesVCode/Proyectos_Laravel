@extends('layouts.learning')

@section('hero')
    @include('partials.learning.courses.hero_single_course')
@endsection

@section('content')
    <div class="container-fluid p-5">
        <div class="row">
            @include('partials.learning.courses.learn.visor')
            @include('partials.learning.courses.learn.sidebar')
        </div>
    </div>
@endsection
{{-- <iframe width="560" height="315" src="https://www.youtube.com/embed/V1zrEGsj234" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe> --}}