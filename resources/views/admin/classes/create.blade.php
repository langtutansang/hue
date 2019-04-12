<div id="create-form" >
    <div class="row">
        <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
            <div class="input-mask-title">
                <label>Tên lớp học</label>
            </div>
        </div>
        <div class="col-lg-10 col-md-10 col-sm-10 col-xs-12">
            <div class="input-mark-inner mg-b-22">
                <input type="text" class="form-control" name="title">
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
                <select data-placeholder="Choose a Country..." name="course" class="chosen-select col-md-12">
                    @foreach($courses as $course)
                        <option value="{{ $course->id }}">{{ $course->title }}</option>
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
                <input type="text" class="form-control" name="teacher">
            </div>
        </div>
    </div>
</div>