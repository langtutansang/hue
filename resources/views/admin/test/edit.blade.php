<div id="edit-form" >
    <div >
        <h4 class="modal-title">Sửa thông tin {{ $row->title}}</h4>
    </div>
    <div class="row">
        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
            <div class="input-mask-title">
                <label>Tên bài test</label>
            </div>
        </div>
        <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
            <div class="input-mark-inner mg-b-22">
                <input type="text" class="form-control" name="title" value="{{ $row->title}}">
            </div>
        </div>
    </div>
    <div class="row select2-class">
        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
            <div class="input-mask-title">
                <label>Chọn lớp học</label>
            </div>
        </div>
        <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12 chosen-select-single">
                <select name="classes" class="chosen-select-classes col-md-12">
                    @foreach($classes as $class)
                        <option value="{{ $class->id }}">{{ $class->course->title }} - {{ $class->title }}</option>
                    @endforeach
                </select>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
            <div class="input-mask-title">
                <label>Mô tả bài test</label>
            </div>
        </div>
        <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
            <div class="input-mark-inner mg-b-22">
                <input type="text" class="form-control" name="description" value="{{ $row->description}}">
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
            <div class="input-mask-title">
                <label>Thời gian test</label>
            </div>
        </div>
        <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
            <div class="input-mark-inner mg-b-22">
                <input type="text" class="form-control" name="timetest" value="{{ $row->timetest}}">
            </div>
        </div>
    </div>
</div>