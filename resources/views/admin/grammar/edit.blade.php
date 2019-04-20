<div id="edit-form" >
    <div>
        <h4 class="modal-title">Sửa thông tin {{ $row->title}}</h4>
    </div>
    <div class="row">
        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
            <div class="input-mask-title">
                <label>Cấu trúc</label>
            </div>
        </div>
        <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
            <div class="input-mark-inner mg-b-22">
                <input type="text" class="form-control" name="title" value="{{ $row->title}}">
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
            <div class="input-mask-title">
                <label>Mô tả</label>
            </div>
        </div>
        <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
            <div class="input-mark-inner mg-b-22">
                <textarea name="description" id="description" rows="10" cols="80">
                    {{ $row->description}}
                </textarea>
            </div>
        </div>
    </div>
</div>