<div class="modal fade" id="create-modal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header primary-modal">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title">Thêm mới</h4>
            </div>
            <div class="modal-body">

                <div class="form-item">
                    <p class="formLabel">Tên</p>
                    <input type="text" name="name" class="form-style" autocomplete="off" />
                </div>
              
                <div class="form-item">
                    <p class="formLabel formTop">Email</p>
                    <input type="text" name="email" class="form-style" autocomplete="off"/>
                </div>

                <div class="form-item">
                    <p class="formLabel formTop">Mật khẩu</p>
                    <input type="password" name="password" class="form-style" autocomplete="off"/>
                </div>
                <div class="form-item">
                    <p class="formLabel formTop">Nhập lại Mật khẩu</p>
                    <input type="password" name="password_confirmation" class="form-style" autocomplete="off"/>
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default float-button-light" data-dismiss="modal">Hủy</button>
                <button type="button" id="create-button" class="btn btn-primary float-button-light ">Lưu</button>
            </div>
        </div>
    </div>
</div>

<script id="template-button-create" type="text/x-custom-template">
    <div class="row">
        <button type="button" class="btn btn-primary" data-target="#create-modal" data-toggle="modal">Thêm mới</button>
    </div>
</script>