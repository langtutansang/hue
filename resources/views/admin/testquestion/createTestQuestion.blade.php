@extends('admin.layouts.index')

@section('content')
<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
    <div id="create-form-testquestion" >
        <div>
            <h2 style="text-align: center">Tạo câu hỏi test</h2>
        </div>
        <div class="row">
            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                <div class="input-mask-title">
                    <label>Tên câu hỏi</label>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <div class="input-mark-inner mg-b-22">
                    <input type="text" class="form-control" name="title">
                </div>
            </div>
        </div>
        <div class="row select2-testtitle">
            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                <div class="input-mask-title">
                    <label>Tên bài test</label>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 chosen-select-single-testquestion">
                <select data-placeholder="Chọn bài test" name="test" class="chosen-select-testquestion col-md-12">
                    @foreach($tests as $test)
                        <option value="{{ $test->id }}">{{ $test->title }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="row select2-answer">
            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                <div class="input-mask-title">
                    <label>Chọn câu trả lời đúng</label>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 chosen-select-single-answer">
                <select data-placeholder="Chọn đáp án đúng" name="answer" class="chosen-select-answer col-md-12">
                    <option value="A">A</option>
                    <option value="B">B</option>
                    <option value="C">C</option>
                    <option value="D">D</option>
                </select>
            </div>
        </div>
        <div class="row select2-typetest">
            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                <div class="input-mask-title">
                    <label>Loại câu hỏi</label>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 chosen-select-single-typequestion">
                <select data-placeholder="Chọn loại" name="typequestion" class="chosen-select-typequestion col-md-12">
                    <option value="Trắc nghiệm">Trắc nghiệm</option>
                    <option value="Tự luận">Tự luận</option>
                </select>
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