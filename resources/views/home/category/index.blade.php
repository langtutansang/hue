@extends("home.layout.index")
@section("content")
    @foreach($courses as $course )        
        @include("home.category.content")
    @endforeach
@endsection

@section("script")
    @include("home.category.script")
@endsection
@section("css")
    @include("home.category.css")
@endsection
