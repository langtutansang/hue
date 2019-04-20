@extends('admin.layouts.index')

@section('content')
    @include('admin.create-lesson.content')
@endsection

@section('css')
    @include('admin.create-lesson.css')
@endsection

@section('script')
    @include('admin.create-lesson.script')
@endsection