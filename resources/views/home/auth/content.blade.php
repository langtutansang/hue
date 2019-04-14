<div class="col-lg-12 col-12">
    <div class="nav-tabs-custom box-profile">
        <ul class="nav nav-tabs">
            <li><a class="active" href="#login" data-toggle="tab">Đăng nhập</a></li>
            <li><a href="#register" data-toggle="tab">Đăng ký</a></li>
        </ul>
        <div class="tab-content">
            <div class="active tab-pane" id="login">
                <div class="col-lg-6 col-md-8 col-12">
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
                                    <input type="password" class="form-control" name="password" required placeholder="Mật khẩu">
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
                </div>
            </div>    
            <div class="tab-pane" id="register">
                <div class="col-lg-6 col-md-8 col-12">
                    <div class="login-box">
                        <div class="login-box-body">
                            <form method="POST" action="{{ url('register') }}" id="register-form" >
                                @csrf
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="email" placeholder="Email" value="{{ old('email') }}" required autofocus>
                                        @if ($errors->has('email'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('email') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <input type="password" class="form-control" name="password" required placeholder="Mật khẩu">
                                        @if ($errors->has('password'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('password') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <input type="password" class="form-control" name="password_confirmation" required placeholder="Nhập lại mật khẩu">
                                        @if ($errors->has('password_confirmation'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('password_confirmation') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="name" required placeholder="Tên khai sinh">
                                        @if ($errors->has('name'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('name') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <input type="number" class="form-control" name="phone" required placeholder="Số điện thoại">
                                        @if ($errors->has('phone'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('phone') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="address" required placeholder="Địa chỉ">
                                        @if ($errors->has('address'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('address') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="identity_card" required placeholder="CMND">
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
                </div>
            </div>
        </div>
    </div>
</div>