<!-- course -->
<div class="mix col-lg-3 col-md-4 col-sm-6 @foreach($course->categories as $category) {{ $category->name }} @endforeach">
    <div class="course-item">
        <div class="course-thumb set-bg" data-setbg="{{ Storage::url($course->picture) }}">
            <div class="price">{{ __("Precio :price €", ["price" => $course->price]) }}</div>
        </div>
        @auth
            <div class="wish-heart position-absolute">
                @if($course->wishedForUser())
                    <i
                        class="fa fa-2x fa-heart-o text-danger toggle-wish"
                        data-route="{{ route("student.wishlist.toggle", ["course" => $course]) }}"
                    ></i>
                @else
                    <i
                        class="fa fa-2x fa-heart-o toggle-wish"
                        data-route="{{ route("student.wishlist.toggle", ["course" => $course]) }}"
                    ></i>
                @endif
            </div>
        @endauth
        <div class="course-info">
            <div class="course-text">
                <h5>{{ $course->title }}</h5>
                <div class="students">{{ __(":count Estudiantes", ['count' => $course->students_count]) }}</div>
            </div>
            <div class="course-author">
                <div class="ca-pic set-bg" data-setbg="/img/authors/1.jpg"></div>
                <p>{{ $course->teacher->name }}</p>
            </div>
            <div class="course-author">
                <a class="site-btn btn-block" href="{{ route('courses.show', ['course' => $course]) }}">{{ __("Ver el curso") }}</a>
            </div>
        </div>
    </div>
</div>