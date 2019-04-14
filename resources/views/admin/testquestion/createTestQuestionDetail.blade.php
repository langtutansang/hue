@extends('admin.layouts.index')

@section('content')
<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
    <div id="create-form-testquestion" >
        <div>
            <h2 style="text-align: center">Tạo đáp án câu hỏi test</h2>
        </div>
        <div class="row select2-testtitle">
            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                <div class="input-mask-title">
                    <label>Câu hỏi</label>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 chosen-select-single-testquestion">
                <select data-placeholder="Chọn bài test question" name="testquestion" class="chosen-select-testquestion col-md-12">
                    @foreach($testquestions as $testquestion)
                        <option value="{{ $testquestion->id }}">{{ $testquestion->title }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                <div class="input-mask-title">
                    <label>Head</label>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <div class="input-mark-inner mg-b-22">
                    <input type="text" class="form-control" name="head">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                <div class="input-mask-title">
                    <label>Câu trả lời</label>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <div class="input-mark-inner mg-b-22">
                    <input type="text" class="form-control" name="answertest">
                </div>
            </div>
        </div>
        <div class="row" style="text-align: center">
            <button class="btn btn-primary">Thêm mới</button>
            <button class="btn btn-danger">Hủy</button>
        </div>
    </div>
</div>
@endsection

@section('css')
    @include('admin.testquestion.css')
@endsection

@section('script')
    @include('admin.testquestion.script')
@endsection
