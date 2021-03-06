<div id="edit-form" >
    <h1 style="color: blue; text-align: center  ">Sửa bài học mới
        <button lesson-id="{{ $row->id }}" style="float:right;margin-right: 30px" id="edit-lesson" class="btn btn-primary waves-effect waves-light">Cập nhật</button>
    </h1>
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="row">
            <div class=" col-md-2 col-sm-2 col-xs-12">
                <div class="input-mask-title">
                    <label>Tên bài học</label>
                </div>
            </div>
            <div class="col-lg-10 col-md-10 col-sm-10 col-xs-12">
                <div class="input-mark-inner mg-b-22">
                    <input type="text" class="form-control" name="lesson-title" value="{{ $row->title }}">
                </div>
            </div>
        </div>
        <div class="row select2-class">
            <div class=" col-md-2 col-sm-2 col-xs-12">
                <div class="input-mask-title">
                    <label>Chọn lớp học</label>
                </div>
            </div>
            <div class="col-lg-10 col-md-10 col-sm-10 col-xs-12 chosen-select-single">
                    <select name="classes_id" class="select2 col-md-12">
                        @foreach($classes as $class)
                            <option {{ $class->id == $row->classes_id ? 'selected' : '' }} value="{{ $class->id }}">{{ $class->title }}</option>
                        @endforeach
                    </select>
            </div>
        </div>
    </div>
    <div class="single-pro-review-area mt-t-30 mg-b-15">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="product-payment-inner-st">
                        <ul id="myTabedu1" class="tab-review-design">
                            <li class="active"><a href="#vocabulary">Soạn từ vựng</a></li>
                            <li><a href="#grammar">Soạn ngữ pháp</a></li>
                            <li><a href="#video">Video</a></li>
                        </ul>
                        <div id="myTabContent" class="tab-content custom-product-edit">
                            <div class="product-tab-list tab-pane fade active in" id="vocabulary">
                                @include('admin.edit-lesson.vocabulary')
                            </div>
                            <div class="product-tab-list tab-pane fade" id="grammar">
                                @include('admin.edit-lesson.grammar')
                            </div>
                            <div class="product-tab-list tab-pane fade" id="video">
                                @include('admin.edit-lesson.video')

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
