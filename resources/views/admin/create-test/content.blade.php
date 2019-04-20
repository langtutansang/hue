<div id="create-form" style="margin-top:20px">
    <h1 style="color: blue; text-align: center  ">Tạo bài kiểm tra mới
        <button style="float:right" id="create-lesson" class="btn btn-success waves-effect waves-light">Lưu</button>
    </h1>
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="row">
            <div class=" col-md-2 col-sm-2 col-xs-12">
                <div class="input-mask-title">
                    <label>Tên bài kiểm tra</label>
                </div>
            </div>
            <div class="col-lg-10 col-md-10 col-sm-10 col-xs-12">
                <div class="input-mark-inner mg-b-22">
                    <input type="text" class="form-control" name="test-title">
                </div>
            </div>
        </div>
        <div class="row">
            <div class=" col-md-2 col-sm-2 col-xs-12">
                <div class="input-mask-title">
                    <label>Tên bài kiểm tra</label>
                </div>
            </div>
            <div class="col-lg-10 col-md-10 col-sm-10 col-xs-12">
                <div class="input-mark-inner mg-b-22">
                    <textarea name="description" id="description" rows="10" cols="80">
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
                    <select name="classes_id" class="select2 col-md-12">
                        @foreach($classes as $class)
                            <option value="{{ $class->id }}">{{ $class->title }}</option>
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
                <input type="number" class="form-control" name="timetest">
            </div>
        </div>
        
    </div>
    
</div>
<div>
    <h1 style="color: blue; text-align: center  ">Nội dung câu hỏi
    <button style="float:right" id="create-lesson" class="btn btn-success waves-effect waves-light">Thêm câu hỏi</button>

    </h1>
</div>