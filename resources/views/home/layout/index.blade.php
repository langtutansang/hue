<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../images/favicon.ico">

    <title>Trang học tiếng anh online</title>
    
	  <!-- Bootstrap 4.0-->
    <link rel="stylesheet" href="{{ asset('home/assets/vendor_components/bootstrap/dist/css/bootstrap.css') }}">
    <!-- Bootstrap extend-->
    <link rel="stylesheet" href="{{ asset('home/css/bootstrap-extend.css') }}">
    <!-- theme style -->
    <link rel="stylesheet" href="{{ asset('home/css/master_style.css') }}">
    <!-- Fab Admin skins -->
    <link rel="stylesheet" href="{{ asset('home/css/skins/_all-skins.css') }}">
    <!-- Vector CSS -->
    <link href="{{ asset('home/assets/vendor_components/jvectormap/lib2/jquery-jvectormap-2.0.2.css') }}" rel="stylesheet" />
    <!-- Morris charts -->
    <link rel="stylesheet" href="{{ asset('home/assets/vendor_components/morris.js/morris.css') }}">
    @yield("css")
  </head>
  <body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">
      @include("home.layout.header")
      <!-- Left side column. contains the logo and sidebar -->
      @include("home.layout.sidebar")
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        @include("home.layout.breadcrumb")
        <!-- Main content -->
        <section class="content" style="font-size: 15px;     background-color: white;">
          @yield("content")
          <!-- /.row -->	      
        </section>
        <!-- /.content -->
        

      </div>
      @include("home.layout.footer")
      <!-- /.content-wrapper -->

    </div>
    <!-- ./wrapper -->
    <!-- jQuery 3 -->
    <script src="{{ asset('home/assets/vendor_components/jquery/dist/jquery.js') }}"></script>
    
    <!-- jQuery UI 1.11.4 -->
    <script src="{{ asset('home/assets/vendor_components/jquery-ui/jquery-ui.js') }}"></script>
    
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
      $.widget.bridge('uibutton', $.ui.button);

    </script>
    
    <!-- popper -->
    <!-- <script src="{{ asset('home/assets/vendor_components/popper/dist/popper.min.js') }}"></script> -->
    
    <!-- Bootstrap 4.0-->
    <script src="{{ asset('home/assets/vendor_components/bootstrap/dist/js/bootstrap.js') }}"></script>	
    
    <!-- ChartJS -->
    <script src="{{ asset('home/assets/vendor_components/chart.js-master/Chart.min.js') }}"></script>
    
    <!-- Slimscroll -->
    <script src="{{ asset('home/assets/vendor_components/jquery-slimscroll/jquery.slimscroll.js') }}"></script>
    
    <!-- FastClick -->
    <script src="{{ asset('home/assets/vendor_components/fastclick/lib/fastclick.js') }}"></script>
    
    <!-- peity -->
    <script src="{{ asset('home/assets/vendor_components/jquery.peity/jquery.peity.js') }}"></script>
    
    <!-- Morris.js charts -->
    <script src="{{ asset('home/assets/vendor_components/raphael/raphael.min.js') }}"></script>
    <script src="{{ asset('home/assets/vendor_components/morris.js/morris.min.js') }}"></script>


    <!-- Fab Admin App -->
    <script src="{{ asset('home/js/template.js') }}"></script>
    <script>
      $(function(){
        $('.sidebar-menu li').each( (key, e) => {
          if($(e).find('a').attr('href') === window.location.pathname ){
            $(e).addClass('active');
            if($(e).parents('ul.treeview-menu').length > 0){
              $(e).parents('li.treeview').addClass('active menu-open');
            }

          }
        })
      })
    </script>

    <!-- Vector map JavaScript -->
    <script src="{{ asset('home/assets/vendor_components/jvectormap/lib2/jquery-jvectormap-2.0.2.min.js') }}"></script>
    <script src="{{ asset('home/assets/vendor_components/jvectormap/lib2/jquery-jvectormap-world-mill-en.js') }}"></script>
    <script src="{{ asset('home/assets/vendor_components/jvectormap/lib2/jquery-jvectormap-us-aea-en.js') }}"></script>
    @yield("script")
  </body>
</html>
