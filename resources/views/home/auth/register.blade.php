

@extends("home.layout.index")
@section("content")
<div class="row mb-20">
    <div class="col-md-4"></div>
    <div class="col-md-4">
        <div class="register-box">
            <div class="register-box-body">
                <form method="POST" action="{{ url('register') }}" id="register-form" >
                    @csrf
                        @if($errors->all())
                            <span class="help-block">
                                <strong>Thông tin bạn nhập không chính xác</strong>
                            </span>
                        @endif
                        <div class="form-group    @if ($errors->has('email'))
                                border border-danger
                            @endif">
                            <input type="text" class="form-control rounded" name="email" placeholder="Email" value="{{ old('email') }}" required autofocus>
                         
                        </div>
                        <div class="form-group    @if ($errors->has('password'))
                                border border-danger
                            @endif">
                            <input type="password" class="form-control rounded" name="password" required placeholder="Mật khẩu" required>
                         
                        </div>
                        <div class="form-group    @if ($errors->has('password_confirmation'))
                                border border-danger
                            @endif">
                            <input type="password" class="form-control rounded" name="password_confirmation" required placeholder="Nhập lại mật khẩu" required>
                         
                        </div>
                        <div class="form-group @if ($errors->has('name'))
                                border border-danger
                            @endif">
                            <input type="text" class="form-control rounded" name="name" required placeholder="Tên khai sinh" required>
                            
                        </div>
                        <div class="form-group   @if ($errors->has('phone'))
                                border border-danger
                            @endif">
                            <input type="number" class="form-control rounded" name="phone" required placeholder="Số điện thoại">
                          
                        </div>
                        <div class="form-group  @if ($errors->has('address'))
                                border border-danger
                            @endif">
                            <input type="text" class="form-control rounded" name="address" required placeholder="Địa chỉ">
                           
                        </div>
                        <div class="form-group  @if ($errors->has('identity_card'))
                                border border-danger
                            @endif">
                            <input type="text" class="form-control rounded" name="identity_card" required placeholder="CMND">
                           
                        </div>
                        <button type="submit" class="btn btn-info btn-block margin-top-10">Đăng ký</button>
                        <a href="/auth/register">Bạn đã có tài khoản</a>
                
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
