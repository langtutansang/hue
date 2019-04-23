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
                @if(Auth::check())
                    @if($classitem->previous_class == NULL || in_array($classitem->previous_class , $rules) != false)
                        @include("home.category.item")
                    @else
                        @include("home.category.item-block")
                    @endif
                @else
                    @if($classitem->previous_class == NULL)
                        @include("home.category.item")
                    @else
                        @include("home.category.item-block")
                    @endif
                @endif
            @endforeach
            <div class="owl-navigate">
            </div>
        </div>
    </div>
</div>
