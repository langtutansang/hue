<div id="edit-form">
    <div >
        <h4 class="modal-title">Sửa thông tin {{ $row->title }}</h4>
    </div>
    <div>

        <div class="form-item">
            <p class="formLabel">Tên</p>
            <input type="text" name="title" class="form-style" autocomplete="off" value="{{ $row->title }}"/>
        </div>

        <div class="form-item">
            <p class="formLabel formTop" style="z-index:3">Loại</p>
            <select id="edit-select" name="type" class="form-style" data-placeholder="Chọn loại">
                    <option value="0" {{  $row->type == 0 ? 'selected' : '' }} >Chữ</option>
                    <option value="1" {{ $row->type == 1 ? 'selected' : '' }} >Màu</option>
            </select>
        </div>
    </div>
</div>