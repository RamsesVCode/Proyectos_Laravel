<!-- course sidebar -->
<div class="card" id="course-sidebar">
    <div class="card-header bg-dark text-white text-center">
        {{ __("Información del curso") }}
    </div>
    <div class="card-body">
        <div class="card-text">
            {!! __("Fecha de publicación: <span class='badge badge-dark float-right'>:created_at</span>", ["created_at" => $course->created_at->format("d/m/Y")]) !!}
        </div>
        <div class="card-text">
            {!! __("Unidades de archivos: <span class='badge badge-dark float-right'>:units</span>", ["units" => $course->totalFileUnits()]) !!}
        </div>
        <div class="card-text">
            {!! __("Unidades de vídeo: <span class='badge badge-dark float-right'>:units</span>", ["units" => $course->totalVideoUnits()]) !!}
        </div>
        <div class="card-text">
            {!! __("Duración total: <span class='badge badge-dark float-right'>:time</span>", ["time" => $course->totalTime()]) !!}
        </div>
    </div>
    <div class="card-footer">
        @include("partials.learning.courses.purchase_button")
        </a>
    </div>
</div>
