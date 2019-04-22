<div id="edit-form" >
    <div >
        <h4 class="modal-title">Sửa thông tin {{ $row->title}}</h4>
    </div>
    <div class="row">
        <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
            <div class="input-mask-title">
                <label>Từ tiếng anh</label>
            </div>
        </div>
        <div class="col-lg-10 col-md-10 col-sm-10 col-xs-12">
            <div class="input-mark-inner mg-b-22">
                <input type="text" class="form-control" name="title" value="{{ $row->title}}">
            </div>
        </div>
    </div>
    <script id="lbdict_plugin_frame" type="text/javascript">
    </script>
    <div class="row">
        <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
            <div class="input-mask-title">
                <label>Nghĩa của từ</label>
            </div>
        </div>
        <div class="col-lg-10 col-md-10 col-sm-10 col-xs-12">
            <div class="input-mark-inner mg-b-22">
                <textarea name="description" id="description" rows="10" cols="80">
                    {{ $row->description}}
                </textarea>
            </div>
        </div>
    </div>
</div>