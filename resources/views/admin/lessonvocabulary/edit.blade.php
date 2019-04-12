<div id="edit-form">
    <div >
        <h4 class="modal-title">Sửa thông tin {{ $row->title}}</h4>
    </div>
    <div>
        <div class="form-item">
            <div class="setStyleForm"  style="margin-top: 9px;font-size: 18px;margin-right: 25px; display: -webkit-inline-box;">ID</div>
            <input type="text" name="id" class="form-style" autocomplete="off" disabled  value="{{ $row->id}}"/>
        </div>
        <div class="form-item">
            <div class="setStyleForm"  style="margin-top: 9px;font-size: 18px;margin-right: 13px; display: -webkit-inline-box;">Tên</div>
            <input type="text" name="title" class="form-style" autocomplete="off" value="{{ $row->title}}"/>
        </div>
    </div>
</div>