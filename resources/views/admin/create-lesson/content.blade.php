<div id="create-form" >
    <h1 style="color: blue; text-align: center  ">Tạo bài học mới
        <button style="float:right" id="create-lesson" class="btn btn-primary waves-effect waves-light">Thêm</button>
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
                    <input type="text" class="form-control" name="lesson-title">
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
                            <option value="{{ $class->id }}">{{ $class->title }} ( {{ $class->course->title }} )</option>
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
                                @include('admin.create-lesson.vocabulary')
                            </div>
                            <div class="product-tab-list tab-pane fade" id="grammar">
                                @include('admin.create-lesson.grammar')
                            </div>
                            <div class="product-tab-list tab-pane fade" id="video">
                                @include('admin.create-lesson.video')

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
