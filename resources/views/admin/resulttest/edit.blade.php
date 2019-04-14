<div id="edit-form" >
    <div>
        <h4 class="modal-title">Sửa thông tin {{ $row->title }}</h4>
    </div>
    <div class="row">
        <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
            <div class="input-mask-title">
                <label>Tên</label>
            </div>
        </div>
        <div class="col-lg-10 col-md-10 col-sm-10 col-xs-12">
            <div class="input-mark-inner mg-b-22">
                <input type="text" class="form-control" name="title" value="{{ $row->title }}">
            </div>
        </div>
    </div>
    <div class="row select2-course">
        <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
            <div class="input-mask-title">
                <label>Khóa học</label>
            </div>
        </div>
        <div class="col-lg-10 col-md-10 col-sm-10 col-xs-12 chosen-select-single">
                <select name="course" class="chosen-select col-md-12">
                    @foreach($courses as $course)
                        <option  {{  $row->course_id == $course->id ? 'selected' : '' }} value="{{ $course->id }}">{{ $course->title }}</option>
                    @endforeach
                </select>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
            <div class="input-mask-title">
                <label>Giáo viên</label>
            </div>
        </div>
        <div class="col-lg-10 col-md-10 col-sm-10 col-xs-12">
            <div class="input-mark-inner mg-b-22">
                <input type="text" class="form-control" name="teacher" value="{{ $row->teacher }}">
            </div>
        </div>
    </div>
</div>