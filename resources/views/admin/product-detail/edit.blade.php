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
            <p class="formLabel formTop" style="z-index:3">Loại sản phẩm</p>
            <select id="edit-select" name="product_id" class="form-style" placeholder="Chọn loại">
                @if($row->product->deleted != 0)
                    <option  selected disabled>{{ $row->product->title }}(đã bị xóa)</option>
                @endif
                @foreach($products as $product)
                    <option value="{{$product->id}}" {{  $row->product_id == $product->id ? 'selected' : '' }}>{{ $product->title }}</option>
                @endforeach
            </select>
        </div>
        <textarea name="description" id="edit-editor">{{ $row->description }}</textarea>
    </div>
</div>