<div class="col-lg-12" id="course{{ $course->id }}">
    <div class="box">        
        <div class="media bb-1 border-fade bg-course">
            <div class="media-body d-flex align-items-center h-50">
                <h1 style="color: blue">
                    {{ $course->title }} ({{ count($course->classes) == 0? "Chưa có ": count($course->classes)}} lớp )
                </h1>
            </div>
        </div>
        @if(count($course->classes) == 0)
            <div class="px-30 pt-20">
                <h1 style="color: red">Khóa học hiện chưa có lớp học</h1>
        @else
            <div class="px-30 pt-20 owl-carousel">
        @endif        
            @foreach( $course->classes as $classitem)
                @include("home.category.item")
            @endforeach
            <div class="owl-navigate">
            </div>
        </div>
    </div>
</div>
