<div id="edit-form">
    <div >
        <h4 class="modal-title">Sửa thông tin {{ $row->title }}</h4>
    </div>
    <div>
        <div class="form-item">
            <p class="formLabel formTop" style="z-index:3">Loại sản phẩm</p>
            <select id="edit-select" name="attribute_id" class="form-style" placeholder="Chọn loại">
                @if($row->attribute->deleted != 0)
                    <option  selected disabled>{{ $row->attribute->title }}(đã bị xóa)</option>
                @endif
                @foreach($attributes as $attribute)
                    <option value="{{$attribute->id}}" type="{{ $attribute->type }}" {{  $row->attribute_id == $attribute->id ? 'selected' : '' }}>{{ $attribute->title }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-item">
            <p class="formLabel">Tên</p>
            <input id="edit-title" type="{{ $row->attribute->type ===0 ? 'text': 'color'}}" name="title" class="form-style" autocomplete="off" value="{{ $row->title }}"/>
        </div>
    </div>
</div>