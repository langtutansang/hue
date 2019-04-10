<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="description" content="bootstrap default admin template">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Login</title>

    <!-- START GLOBAL CSS -->
    <link href="{{ asset('admin-asset/global/plugins/bootstrap/dist/css/bootstrap.min.css')}}" type="text/css" rel="stylesheet"/>
    <link href="{{ asset('admin-asset/global/plugins/Waves/dist/waves.min.css')}}" type="text/css" rel="stylesheet"/>
    <!-- END GLOBAL CSS -->

    <!-- START PAGE PLUG-IN CSS -->
    <link rel="stylesheet" href="{{ asset('admin-asset/icons_fonts/font-awesome/css/font-awesome.min.css')}}"/>
    <!-- END PAGE PLUG-IN CSS -->

    <!-- START TEMPLATE GLOBAL CSS -->
    <link href="{{ asset('admin-asset/pages/login/css/user_login_v2.css')}}" type="text/css" rel="stylesheet"/>
    <!-- END TEMPLATE GLOBAL CSS -->

    <!-- Start favicon ico -->
    <link rel="icon" href="{{ asset('admin-asset/favicon/prince.ico')}}" type="image/x-icon"/>
    <link rel="icon" type="image/png" sizes="192x192" href="{{ asset('admin-asset/favicon/prince-192x192.png')}}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('admin-asset/favicon/prince-180x180.png')}}">
    <!-- End favicon ico -->

</head>
<body>

    <div class="login-background" style="background-image: url('{{asset('admin-asset/pages/login/images/login_2.jpg' ) }}' )">
        <div class="login-left-section">
            <h2>Hệ thống quản lý bán hàng online</h2>
        </div>
        <!--  START LOGIN -->
        <div class="login-page">
            <div class="main-login-contain">
                <div class="login-form">
                    <form id="form-validation" method="post" action="{{ route('adminAuth.submitLogin') }}">
                        @csrf

                        <h4>Đăng nhập tài khoản của bạn </h4>
                        <p class="text-danger">
                            @if(old('status'))
                                {{ old('status')  }}
                            @endif
                        </p>
                            <div class="form-group">
                            <input required="required" type="email" id="email" name="email" value="{{ old('email') }}">
                            <label class="control-label" for="email">Nhập email</label><i class="bar"></i>
                            @if ($errors->has('email'))
                                    <span class="invalid-feedback text-danger" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                        </div>
                        <div class="form-group">
                            <input required="required" type="password" id="password" name="password" value="{{ old('password') }}">
                            <label class="control-label" for="password">Nhập mật khẩu</label><i class="bar"></i>
                            @if ($errors->has('password'))
                                    <span class="invalid-feedback text-danger" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                        </div>

                        <div class="goto-login">
                            <div class="forgot-password-login">
                                    <input {{ old('remember') ? 'checked' : '' }} class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                    <label class="form-check-label" for="remember">Ghi nhớ</label>
                            </div>
                            <button type="submit" class="btn btn-login float-button-light">Đăng nhập</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
        <!--  END LOGIN -->
    </div>

    <!-- START CORE JAVASCRIPT -->
    <script src="{{ asset('admin-asset/global/plugins/jquery/dist/jquery.min.js')}}"></script>
    <script src="{{ asset('admin-asset/global/plugins/bootstrap/dist/js/bootstrap.min.js')}}"></script>
    <script src="{{ asset('admin-asset/global/plugins/Waves/dist/waves.min.js')}}"></script>
    <!-- END CORE JAVASCRIPT -->

    <!-- START PAGE JAVASCRIPT -->
    <script>
        function openNav() {
            document.getElementById("myNav").style.width = "100%";
        }

        function closeNav() {
            document.getElementById("myNav").style.width = "0%";
        }

        !(function ($) {
            if (typeof Waves !== 'undefined') {
                Waves.attach('.float-button-light', ['waves-button', 'waves-float', 'waves-light']);
                Waves.init();
            }
        })(jQuery);
    </script>
    <!-- END PAGE JAVASCRIPT -->

    </body>
</html>