<div id="edit-form">
    <div >
        <h4 class="modal-title">Sửa thông tin {{ $row->title}}</h4>
    </div>
    <div>

        <div class="form-item">
            <p class="formLabel">Tên</p>
            <input type="text" name="title" class="form-style" autocomplete="off" value="{{ $row->title}}"/>
        </div>

        <div class="form-item">
            <p class="formLabel ">Chú thích</p>
            <input type="text" name="description" class="form-style" autocomplete="off"  value="{{ $row->description}}"/>
        </div>

        <div class="form-item">
            <p class="formLabel formTop">Slug</p>
            <input type="text" name="slug" class="form-style" autocomplete="off" disabled  value="{{ $row->slug}}"/>
        </div>
    </div>
</div>