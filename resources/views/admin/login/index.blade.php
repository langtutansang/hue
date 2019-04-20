<!doctype html>
<html class="no-js" lang="en">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>Login | Kiaalap - Kiaalap Admin Template</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- favicon
            ============================================ -->
        <link rel="shortcut icon" type="image/x-icon" href="{{ asset('admin-asset/img/favicon.ico')}}">
        <!-- Google Fonts
            ============================================ -->
        <link href="https://fonts.googleapis.com/css?family=Play:400,700" rel="stylesheet">
        <!-- Bootstrap CSS
            ============================================ -->
        <link rel="stylesheet" href="{{ asset('admin-asset/css/bootstrap.min.css')}}">
        <!-- Bootstrap CSS
            ============================================ -->
        <link rel="stylesheet" href="{{ asset('admin-asset/css/font-awesome.min.css')}}">
        <!-- owl.carousel CSS
            ============================================ -->
        <link rel="stylesheet" href="{{ asset('admin-asset/css/owl.carousel.css')}}">
        <link rel="stylesheet" href="{{ asset('admin-asset/css/owl.theme.css')}}">
        <link rel="stylesheet" href="{{ asset('admin-asset/css/owl.transitions.css')}}">
        <!-- animate CSS
            ============================================ -->
        <link rel="stylesheet" href="{{ asset('admin-asset/css/animate.css')}}">
        <!-- normalize CSS
            ============================================ -->
        <link rel="stylesheet" href="{{ asset('admin-asset/css/normalize.css')}}">
        <!-- main CSS
            ============================================ -->
        <link rel="stylesheet" href="{{ asset('admin-asset/css/main.css')}}">
        <!-- mCustomScrollbar CSS
            ============================================ -->
        <link rel="stylesheet" href="{{ asset('admin-asset/css/scrollbar/jquery.mCustomScrollbar.min.css')}}">
        <!-- metisMenu CSS
            ============================================ -->
        <link rel="stylesheet" href="{{ asset('admin-asset/css/metisMenu/metisMenu.min.css')}}">
        <link rel="stylesheet" href="{{ asset('admin-asset/css/metisMenu/metisMenu-vertical.css')}}">

        <link rel="stylesheet" href="{{ asset('admin-asset/css/calendar/fullcalendar.min.css')}}">
        <link rel="stylesheet" href="{{ asset('admin-asset/css/calendar/fullcalendar.print.min.css')}}">
        <link rel="stylesheet" href="{{ asset('admin-asset/css/morrisjs/morris.css')}}">
       
        <!-- forms CSS
            ============================================ -->
        <link rel="stylesheet" href="{{ asset('admin-asset/css/form/all-type-forms.css')}}">
        <!-- style CSS
            ============================================ -->
        <link rel="stylesheet" href="{{ asset('admin-asset/style.css')}}">
        <!-- responsive CSS
            ============================================ -->
        <link rel="stylesheet" href="{{ asset('admin-asset/css/responsive.css')}}">
        <!-- modernizr JS
            ============================================ -->
        <script src="{{ asset('admin-asset/js/vendor/modernizr-2.8.3.min.js')}}"></script>
    </head>

    <body>
        <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
        <div class="error-pagewrap">
            <div class="error-page-int">
                <div class="text-center m-b-md custom-login">
                    <h3>Đăng nhập</h3>
                </div>
                <div class="content-error">
                    <div class="hpanel">
                        <div class="panel-body">
                            <form action="/admin/login" method="post" >
                                @csrf
                                <div class="form-group">
                                    <label class="control-label" for="email">Email</label>
                                    <input type="email" placeholder="Điền email" required name="email" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label class="control-label" for="password">Mật khẩu</label>
                                    <input type="password" required  name="password"class="form-control">
                                </div>
                                <div class="checkbox login-checkbox">
                                    <label>
                                    <input type="checkbox" class="i-checks"> Ghi nhớ </label>
                                </div>
                                <button class="btn btn-success btn-block loginbtn">Đăng nhập</button>
                            </form>
                        </div>
                    </div>
                </div>
 
            </div>   
        </div>
        <!-- jquery
            ============================================ -->
        <script src="{{ asset('admin-asset/js/vendor/jquery-1.12.4.min.js')}}"></script>
        <!-- bootstrap JS
            ============================================ -->
        <script src="{{ asset('admin-asset/js/bootstrap.min.js')}}"></script>
        <!-- wow JS
            ============================================ -->
        <script src="{{ asset('admin-asset/js/wow.min.js')}}"></script>
        <!-- price-slider JS
            ============================================ -->
        <script src="{{ asset('admin-asset/js/jquery-price-slider.js')}}"></script>
        <!-- meanmenu JS
            ============================================ -->
        <script src="{{ asset('admin-asset/js/jquery.meanmenu.js')}}"></script>
        <!-- owl.carousel JS
            ============================================ -->
        <script src="{{ asset('admin-asset/js/owl.carousel.min.js')}}"></script>
        <!-- sticky JS
            ============================================ -->
        <script src="{{ asset('admin-asset/js/jquery.sticky.js')}}"></script>
        <!-- scrollUp JS
            ============================================ -->
        <script src="{{ asset('admin-asset/js/jquery.scrollUp.min.js')}}"></script>
        <!-- mCustomScrollbar JS
            ============================================ -->
        <script src="{{ asset('admin-asset/js/scrollbar/jquery.mCustomScrollbar.concat.min.js')}}"></script>
        <script src="{{ asset('admin-asset/js/scrollbar/mCustomScrollbar-active.js')}}"></script>
        <!-- metisMenu JS
            ============================================ -->
        <script src="{{ asset('admin-asset/js/metisMenu/metisMenu.min.js')}}"></script>
        <script src="{{ asset('admin-asset/js/metisMenu/metisMenu-active.js')}}"></script>
        <!-- tab JS
            ============================================ -->
        <script src="{{ asset('admin-asset/js/tab.js')}}"></script>
        <!-- icheck JS
            ============================================ -->
        <script src="{{ asset('admin-asset/js/icheck/icheck.min.js')}}"></script>
        <script src="{{ asset('admin-asset/js/icheck/icheck-active.js')}}"></script>
        <!-- plugins JS
            ============================================ -->
        <script src="{{ asset('admin-asset/js/plugins.js')}}"></script>
        <!-- main JS
            ============================================ -->
        <script src="{{ asset('admin-asset/js/main.js')}}"></script>

    </body>

</html>