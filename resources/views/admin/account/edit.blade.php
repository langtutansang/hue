<div id="edit-form">
    <div >
        <h4 class="modal-title">Sửa thông tin {{ $row->title }}</h4>
    </div>
    <div>

        <div class="form-item">
            <p class="formLabel">Tên</p>
            <input type="text" name="name" class="form-style" autocomplete="off" value="{{ $row->name }}"/>
        </div>
   
    </div>
    @if(Auth::guard('admin')->id() == $row->id)
    <div >
        <h4 class="modal-title">Đổi mật khẩu</h4>
    </div>
    <div>

        <div class="form-item">
            <p class="formLabel">Mật khẩu cũ</p>
            <input type="password" name="password_old" class="form-style" autocomplete="off"/>
        </div>
        <div class="form-item">
            <p class="formLabel">Mật khẩu</p>
            <input type="password" name="password" class="form-style" autocomplete="off"/>
        </div> <div class="form-item">
            <p class="formLabel">Nhập lại mật khẩu</p>
            <input type="password" name="password_confirmation" class="form-style" autocomplete="off" />
        </div>
    </div>
    @endif
    
</div>