<div class="col-lg-12" id="course{{ $course->id }}">
    <div class="box">
        <div class="media bb-1 border-fade bg-course">
            <img class="avatar avatar-lg" style="width: 50px; height: 50px" src="{{ asset('storage/admin/' . $course->image) }}" alt="...">
            <div class="media-body d-flex align-items-center h-50">
                <h2>
                    {{ $course->name }}
                </h2>
            </div>
        </div>
        <div class="px-30 pt-20 owl-carousel">
            @foreach( $course->classes as $classitem)
                @include("home.category.item")
            @endforeach
            <div class="owl-navigate">
            </div>
        </div>
    </div>
</div>
