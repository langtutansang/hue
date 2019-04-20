@extends("home.layout.index")
@section("content")
    @if(count($courses))
        @foreach($courses as $course )        
            @include("home.category.content")
        @endforeach
    @else
        <div class="media bb-1 border-fade bg-course">
            <div class="media-body d-flex align-items-center h-50">
                <h1 style="color: blue">
                    chưa có khóa học nào
                </h1>
            </div>
        </div>
    @endif
@endsection

@section("script")
    @include("home.category.script")
@endsection
@section("css")
    @include("home.category.css")
@endsection
