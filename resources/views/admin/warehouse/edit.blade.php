<div id="edit-form">
    <div >
        <h4 class="modal-title">Sửa thông tin {{ $row->product->title}}</h4>
    </div>
    <div>

        <div class="form-item">
            <p class="formLabel formTop">Số lượng tồn kho</p>
            <input type="number" name="inventory" class="form-style" autocomplete="off"  value="{{ $row->inventory}}"/>
        </div>

        <div class="form-item">
            <p class="formLabel formTop">GIá gốc</p>
            <input type="number" name="cost" class="form-style" autocomplete="off"   value="{{ $row->cost}}"/>
        </div>
    </div>
</div>


