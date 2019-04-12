<!doctype html>
<html class="no-js') }}" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Học tiếng Anh online</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- favicon
		============================================ -->
    <link rel="shortcut icon" type="image/x-icon" href="img/favicon.ico">
    <!-- Bootstrap CSS
		============================================ -->
    <link rel="stylesheet" href="{{ asset('admin-asset/css/bootstrap.min.css') }}">
    <!-- Bootstrap CSS
		============================================ -->
    <link rel="stylesheet" href="{{ asset('admin-asset/css/font-awesome.min.css') }}">
    <!-- animate CSS
		============================================ -->
    <link rel="stylesheet" href="{{ asset('admin-asset/css/animate.css') }}">
    <!-- normalize CSS
		============================================ -->
    <link rel="stylesheet" href="{{ asset('admin-asset/css/normalize.css') }}">
    <!-- meanmenu icon CSS
		============================================ -->
    <link rel="stylesheet" href="{{ asset('admin-asset/css/meanmenu.min.css') }}">
    <!-- main CSS
		============================================ -->
    <link rel="stylesheet" href="{{ asset('admin-asset/css/main.css') }}">
    <!-- educate icon CSS
		============================================ -->
    <link rel="stylesheet" href="{{ asset('admin-asset/css/educate-custon-icon.css') }}">
    <!-- mCustomScrollbar CSS
		============================================ -->
    <link rel="stylesheet" href="{{ asset('admin-asset/css/scrollbar/jquery.mCustomScrollbar.min.css') }}">
    <!-- metisMenu CSS
		============================================ -->
    <link rel="stylesheet" href="{{ asset('admin-asset/css/metisMenu/metisMenu.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin-asset/css/metisMenu/metisMenu-vertical.css') }}">
    <!-- style CSS
		============================================ -->
    <link rel="stylesheet" href="{{ asset('admin-asset/css/style.css') }}">
    <!-- responsive CSS
		============================================ -->
    <link rel="stylesheet" href="{{ asset('admin-asset/css/responsive.css') }}">
    <link rel="stylesheet" href="{{ asset('admin-asset/toastr/toastr.min.css')}}"/>
    <meta name="_token" content="{{ csrf_token() }}">

    @yield("css")
    <!-- modernizr JS
		============================================ -->
    <script src="{{ asset('admin-asset/js/vendor/modernizr-2.8.3.min.js') }}"></script>
</head>

<body>
    <!--[if lt IE 8]>
		<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
	<![endif]-->
    <!-- Start Left menu area -->
    @include("admin.layouts.menu")
    <!-- End Left menu area -->
    <!-- Start Welcome area -->
    <div class="all-content-wrapper">
        @include("admin.layouts.topbar")
        @include("admin.layouts.content")
        @include("admin.layouts.footer")
    </div>

    <!-- jquery
		============================================ -->
    <script src="{{ asset('admin-asset/js/vendor/jquery-1.12.4.min.js') }}"></script>
    <script src="{{ asset('admin-asset/js/custom.js') }}"></script>
    <!-- bootstrap JS
		============================================ -->
    <script src="{{ asset('admin-asset/js/bootstrap.min.js') }}"></script>
    <!-- wow JS
		============================================ -->
    <script src="{{ asset('admin-asset/js/wow.min.js') }}"></script>
    <!-- meanmenu JS
		============================================ -->
    <script src="{{ asset('admin-asset/js/jquery.meanmenu.js') }}"></script>
    <!-- sticky JS
		============================================ -->
    <script src="{{ asset('admin-asset/js/jquery.sticky.js') }}"></script>
    <!-- scrollUp JS
		============================================ -->
    <script src="{{ asset('admin-asset/js/jquery.scrollUp.min.js') }}"></script>
    <!-- mCustomScrollbar JS
		============================================ -->
    <script src="{{ asset('admin-asset/js/scrollbar/jquery.mCustomScrollbar.concat.min.js') }}"></script>
    <script src="{{ asset('admin-asset/js/scrollbar/mCustomScrollbar-active.js') }}"></script>
    <!-- metisMenu JS
		============================================ -->
    <script src="{{ asset('admin-asset/js/metisMenu/metisMenu.min.js') }}"></script>
    <script src="{{ asset('admin-asset/js/metisMenu/metisMenu-active.js') }}"></script>
    <!-- plugins JS
		============================================ -->
    <script src="{{ asset('admin-asset/js/plugins.js') }}"></script>
    <!-- main JS
		============================================ -->
    <script src="{{ asset('admin-asset/js/main.js') }}"></script>
    <script src="{{ asset('admin-asset/toastr/toastr.min.js')}}"></script>
    <script>
      $(function(){
        $.ajaxSetup({
          headers: {
          'X-CSRF-Token': $('meta[name="_token"]').attr('content')
          }
        });
      });

    </script>
    @yield("script")
</body>

</html>