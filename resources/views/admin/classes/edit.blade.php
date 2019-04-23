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
    <div class="row">
        <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
            <div class="input-mask-title">
                <label>Khóa học</label>
            </div>
        </div>
        <div class="col-lg-10 col-md-10 col-sm-10 col-xs-12 chosen-select-single">
                <select name="course" class="select2 col-md-12">
                    @foreach($courses as $course)
                        <option  {{  $row->course_id == $course->id ? 'selected' : '' }} value="{{ $course->id }}">{{ $course->title }}</option>
                    @endforeach
                </select>
        </div>
    </div>
    <div class="row ">
        <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
            <div class="input-mask-title">
                <label>Lớp trước</label>
            </div>
        </div>
        <div class="col-lg-10 col-md-10 col-sm-10 col-xs-12">
            <select name="previous_class" class="form-control col-md-12"  {{  $row->previous_class == "" ? 'selected' : '' }}>
                <option value="" selected>Không có lớp trước</option>
                @foreach($classes as $class)
                    @if(  $class->id !== $row->id)
                        <option value="{{ $class->id }}" course_id="{{ $class->course_id }}"  {{  $row->previous_class == $class->id ? 'selected' : '' }} >{{ $class->title }}</option>
                    @endif
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
                <select name="admin_id" class="select2 col-md-12">
                    @foreach($admins as $admin)
                        <option  {{  $row->admin_id == $admin->id ? 'selected' : '' }} value="{{ $admin->id }}">{{ $admin->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>
    </div>
</div>