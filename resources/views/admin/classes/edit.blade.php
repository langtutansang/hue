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
            <select id="edit-select" name="category_id" class="form-style" placeholder="Chọn loại">
                @if($row->category->deleted != 0)
                    <option  selected disabled>{{ $row->category->title }}(đã bị xóa)</option>
                @endif
                @foreach($categories as $category)
                    <option value="{{$category->id}}" {{  $row->category_id == $category->id ? 'selected' : '' }}>{{ $category->title }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-item">
            <p class="formLabel formTop">Slug</p>
            <input type="text" name="slug" class="form-style" autocomplete="off" disabled value="{{ $row->slug }}"/>
        </div>
    </div>
</div>