<div id="edit-form" >
    <div >
        <h4 class="modal-title">Sửa thông tin {{ $row->title}}</h4>
    </div>
    <div class="row">
        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
            <div class="input-mask-title">
                <label>Tên khóa học</label>
            </div>
        </div>
        <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
            <div class="input-mark-inner mg-b-22">
                <input type="text" class="form-control" name="title" value="{{ $row->title}}">
            </div>
        </div>
    </div>
    <div class="row select2-category">
        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
            <div class="input-mask-title">
                <label>Loại khóa học</label>
            </div>
        </div>
        <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12 chosen-select-single">
                <select name="category" class="chosen-select-category col-md-12">
                    @foreach($categories as $category)
                        <option {{  $row->category_id == $category->id ? 'selected' : '' }} value="{{ $category->id }}">{{ $category->title }}</option>
                    @endforeach
                </select>
        </div>
    </div>
</div>