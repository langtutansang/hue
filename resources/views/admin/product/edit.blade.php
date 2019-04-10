<div id="edit-form">
    <div >
        <h4 class="modal-title">Sửa thông tin {{ $row->title}}</h4>
    </div>
    <div>
        <div class="form-item edit-upload-div upload-div" style="background:url({{ asset('storage/background/upload.png') }}) no-repeat center center">
            <img oldsrc="{{ asset($row->picture)}}" src="{{ asset($row->picture)}}"/>
        </div>
        <input id="edit-upload-input" type="file" name="picture" class="form-style upload-input" autocomplete="off" />


        <div class="form-item">
            <p class="formLabel">Tên</p>
            <input type="text" name="title" class="form-style" autocomplete="off" value="{{ $row->title}}" />
        </div>

        <div class="form-item">
            <p class="formLabel ">Giá</p>
            <input type="text" name="price" class="form-style" autocomplete="off" value="{{ $row->price}}"/>
        </div>

        <div class="form-item">
            <p class="formLabel">Giảm giá</p>
            <input type="text" name="sale" class="form-style" autocomplete="off" value="{{ $row->sale}}"/>
        </div>

        <div class="form-item">
            <p class="formLabel formTop" style="z-index:3">Loại</p>
            <select id="create-select" name="brand_id" class="form-style" data-placeholder="Chọn loại">
                @foreach($brands as $brand)
                    <option  {{  $row->brand_id == $brand->id ? 'selected' : '' }} value="{{$brand->id}}">{{ $brand->title }}</option>
                @endforeach
            </select>
        </div>
    </div>
</div>


