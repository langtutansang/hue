@extends('admin.layouts.index')

@section('content')
    @include('admin.lesson.createlesson')
@endsection

@section('css')
    @include('admin.lesson.css')
@endsection

@section('script')
    @include('admin.lesson.script')
@endsection
