<div id="edit-form" style="margin-top:20px" row-id="{{ $row->id }}">
    <h1 style="color: blue; text-align: center  ">Sửa bài kiểm tra
    </h1>
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="row">
            <div class=" col-md-2 col-sm-2 col-xs-12">
                <div class="input-mask-title">
                    <label>Sửa bài kiểm tra</label>
                </div>
            </div>
            <div class="col-lg-10 col-md-10 col-sm-10 col-xs-12">
                <div class="input-mark-inner mg-b-22">
                    <input type="text" class="form-control" name="test-title" value="{{ $row->title }}">
                </div>
            </div>
        </div>
        <div class="row">
            <div class=" col-md-2 col-sm-2 col-xs-12">
                <div class="input-mask-title">
                    <label>Chi tiết kiểm tra</label>
                </div>
            </div>
            <div class="col-lg-10 col-md-10 col-sm-10 col-xs-12">
                <div class="input-mark-inner mg-b-22">
                    <textarea name="description" id="description" rows="10" cols="80">{!! $row->description !!}
                    </textarea>
                </div>
            </div>
        </div>
        
        <div class="row select2-class">
            <div class=" col-md-2 col-sm-2 col-xs-12">
                <div class="input-mask-title">
                    <label>Thuộc lớp</label>
                </div>
            </div>
            <div class="col-lg-10 col-md-10 col-sm-10 col-xs-12 chosen-select-single">
                    <select name="classes_id" class="select2 col-md-12" disabled>
                        @foreach($classes as $class)
                            <option {{ $class->id == $row->classes_id ? 'selected' : '' }} value="{{ $class->id }}">{{ $class->title }}- {{ $class->course->title}}</option>
                        @endforeach
                    </select>
            </div>
        </div>
        <div class="row select2-class">
            <div class=" col-md-2 col-sm-2 col-xs-12">
                <div class="input-mask-title">
                    <label>Thời gian(đơn vị: phút)</label>
                </div>
            </div>
            <div class="col-lg-10 col-md-10 col-sm-10 col-xs-12 chosen-select-single">
                <input type="number" class="form-control" name="timetest" value="{{ $row->timetest }}">
            </div>
        </div>
        
    </div>
    
</div>
<div>
    <h1 style="color: blue; text-align: center  ">Nội dung câu hỏi
        <button style="float:right" id="create-question" class="btn btn-success waves-effect waves-light">Thêm câu hỏi</button>
    </h1>
    <div class="row ">
        <div class="col-md-12 content-question">
            @foreach($row->testQuestion as $index => $testQuestion)
                @if($testQuestion->type)
                    <div class="question-detail" style="padding: 10px 30px; position: relative">
                        <button class="btn btn-link text-danger delete-question"><i class="fa fa-trash"></i></button>
                        <input type="hidden" value="{{ $testQuestion->answer }}" />
                        <div class="tab-content-details" style="text-align:left">
                            <div class="row">
                                <div class="col-md-12">
                                    <label>Câu số {{ $index + 1}}</label>: <span>{{ $testQuestion->title }}</span>
                                </div>
                                <div class="col-md-12">
                                    <input value="{{ $testQuestion->answer }}" type="text" class="form-control" readonly>
                                </div>
                            </div>

                        </div>

                    </div>
                @else
                    <div class="question-detail" style="padding: 10px 30px; position: relative">
                        <button class="btn btn-link text-danger delete-question"><i class="fa fa-trash"></i></button>
                        <div class="tab-content-details" style="text-align:left">
                            <input type="hidden" value="{{ $testQuestion->answer }}" />
                            <div class="row">
                                <div class="col-md-12">
                                    <label>Câu số {{ $index + 1}}</label>: <span>{{ $testQuestion->title }}</span>
                                </div>
                                <div class="col-md-12">
                                    @foreach($testQuestion->testQuestionDetail as $testQuestionDetail)
                                        <div class="input-group {{ $testQuestion->answer == $testQuestionDetail->head ? 'text-primary' : ''  }}">
                                            <span class="input-group-addon head">{{ $testQuestionDetail->head }}</span>
                                            <input value="{{ $testQuestionDetail->answered }}" type="text" class="form-control" readonly>
                                        </div>
                                    @endforeach
                                </div>
                            </div>

                        </div>

                    </div>
                @endif
            @endforeach
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-11 p-5">
        <button style="float:right" id="edit-lesson" class="btn btn-success waves-effect waves-light">Lựu lại chỉnh sửa</button>

    </div>
</div>


<script id="create-question-template" type="text/template">
    @include('admin.create-test.question')
</script>