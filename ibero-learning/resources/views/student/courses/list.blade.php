<!-- course section -->
<section class="course-section spad">
    <div class="container">
        <div class="section-title mb-4 mt-0 pt-0">
            <h2>{{ __("Los cursos que has comprado") }}</h2>
        </div>
    </div>

    <div class="course-warp">
        <div class="row course-items-area">
            @forelse($courses as $course)
                <!-- course -->
                    <div class="mix col-lg-4 col-md-6 col-sm-6">
                        <div class="course-item">
                            <div class="course-thumb set-bg" data-setbg="{{ Storage::url($course->picture) }}">
                                <div class="categories">{{ $course->categories->pluck("name")->implode(', ') }}</div>
                            </div>
                            <div class="course-info">
                                <div class="course-text">
                                    <h5>{{ $course->title }}</h5>
                                </div>
                                <div class="course-author">
                                    <a href="{{ route('courses.show', ['course' => $course]) }}">{{ __("Ir al curso") }}</a>
                                </div>
                            </div>
                        </div>
                    </div>
                <!-- course end -->
            @empty
                <div class="container">
                    <div class="empty-results">
                        {!! __("No tienes ningún curso todavía: :link", ["link" => "<a href='".route('courses.index')."'>Ir a ver los cursos</a>"]) !!}
                    </div>
                </div>
            @endforelse
        </div>
    </div>
</section>
<!-- course section end -->
