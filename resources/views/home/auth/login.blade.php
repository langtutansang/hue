<div class="login-box">
    <div class="login-box-body">
        <form method="POST" action="{{ url('login') }}" id="login-form">
            @csrf
            <div class="form-group has-feedback">
                
                <input type="text" class="form-control rounded" placeholder="Email" name="email" value="{{ old('email') }}" required autofocus>
                @if ($errors->has('email'))
                    <span class="help-block">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif
                
            </div>
            <div class="form-group has-feedback">
                <input type="password" class="form-control rounded" name="password" required placeholder="Mật khẩu">
                @if ($errors->has('password'))
                    <span class="help-block">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                @endif
            </div>
            <div class="row">
                <div class="col-6">
                <div class="checkbox">
                    <input type="checkbox" id="basic_checkbox_1" >
                    <label for="basic_checkbox_1">Remember Me</label>
                </div>
                </div>
                <div class="col-6">
                <div class="fog-pwd text-right">
                    <a href="javascript:void(0)" class="text-danger"><i class="ion ion-locked"></i> Forgot pwd?</a><br>
                </div>
                </div>
                <div class="col-12 text-center">
                <button type="submit" class="btn btn-info btn-block margin-top-10">Đăng nhập </button>
                </div>
            </div>
        </form>
    </div>
</div>