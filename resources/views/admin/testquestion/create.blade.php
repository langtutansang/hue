<div id="create-form" > 
    <div class="row">
        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
            <div class="input-mask-title">
                <label>Tên lớp học</label>
            </div>
        </div>
        <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
            <div class="input-mark-inner mg-b-22">
                <input type="text" class="form-control" name="title">
            </div>
        </div>
    </div>
    <div class="row select2-course">
        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
            <div class="input-mask-title">
                <label>Khóa học</label>
            </div>
        </div>
        <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12 chosen-select-single">
            <select data-placeholder="chọn khóa học" name="course" class="chosen-select col-md-12">
                @foreach($courses as $course)
                    <option value="{{ $course->id }}">{{ $course->title }}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
            <div class="input-mask-title">
                <label>Giáo viên</label>
            </div>
        </div>
        <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
            <div class="input-mark-inner mg-b-22">
                <input type="text" class="form-control" name="teacher">
            </div>
        </div>
    </div>
</div>