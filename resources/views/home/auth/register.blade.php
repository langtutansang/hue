<div class="register-box">
    <div class="register-box-body">
        <form method="POST" action="{{ url('register') }}" id="register-form" >
            @csrf
                <div class="form-group">
                    <input type="text" class="form-control rounded" name="email" placeholder="Email" value="{{ old('email') }}" required autofocus>
                    @if ($errors->has('email'))
                        <span class="help-block">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="form-group">
                    <input type="password" class="form-control rounded" name="password" required placeholder="Mật khẩu">
                    @if ($errors->has('password'))
                        <span class="help-block">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="form-group">
                    <input type="password" class="form-control rounded" name="password_confirmation" required placeholder="Nhập lại mật khẩu">
                    @if ($errors->has('password_confirmation'))
                        <span class="help-block">
                            <strong>{{ $errors->first('password_confirmation') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="form-group">
                    <input type="text" class="form-control rounded" name="name" required placeholder="Tên khai sinh">
                    @if ($errors->has('name'))
                        <span class="help-block">
                            <strong>{{ $errors->first('name') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="form-group">
                    <input type="number" class="form-control rounded" name="phone" required placeholder="Số điện thoại">
                    @if ($errors->has('phone'))
                        <span class="help-block">
                            <strong>{{ $errors->first('phone') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="form-group">
                    <input type="text" class="form-control rounded" name="address" required placeholder="Địa chỉ">
                    @if ($errors->has('address'))
                        <span class="help-block">
                            <strong>{{ $errors->first('address') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="form-group">
                    <input type="text" class="form-control rounded" name="identity_card" required placeholder="CMND">
                    @if ($errors->has('identity_card'))
                        <span class="help-block">
                            <strong>{{ $errors->first('identity_card') }}</strong>
                        </span>
                    @endif
                </div>
                <button type="submit" class="btn btn-info btn-block margin-top-10">Đăng ký</button>
        </form>
    </div>
</div>