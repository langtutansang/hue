<header class="main-header">
    <!-- Logo -->
    <a href="/" class="logo">
      <!-- mini logo -->
      <b class="logo-mini">
        <span class="light-logo"><img src="{{ asset('home/img/logosn.png')}}" alt="logo"></span>
        <span class="dark-logo"><img src="{{ asset('home/img/logosn.png')}}" alt="logo"></span>
      </b>
        <!-- logo-->
        <span class="logo-lg">
          <h4 style="font-size:120%">ELEARNING</h4>
      </span>
    </a>
    
    <!-- Header Navbar -->
    <nav class="navbar navbar-static-top">
      <div>
        <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
        </a>
      </div>
      <div class="navbar-custom-menu" >
        <ul class="nav navbar-nav float-right" >
		  
		      <li class="search-box">

          </li>			
		  <!-- User Account-->
          <li class="dropdown user user-menu">
            @if(Auth::check())
              <a href="#" class="dropdown-toggle" data-toggle="dropdown"><img style="margin-right: 5px;border-radius: 50%; width: 50px; height:50px" src="{{ Auth::user()->picture}}"> {{ Auth::user()->name }}</a>
              <ul class="dropdown-menu scale-up">
                <!-- User image -->
                <li >
                    <h4 class="mb-5">{{ Auth::user()->email }}</h4>
                  
                </li>

                <!-- Menu Body -->
                <li class="user-body">
                  <div class="row no-gutters">
                    <div class="col-12 text-left">
                      <a href="/profile"><i class="ion ion-person"></i>Thông tin</a>
                    </div>
                    <div class="col-12 text-left">
                      <a href="/historytest"><i class="ion ion-email-unread"></i> Lịch sử thi</a>
                    </div>
                    <div role="separator" class="divider col-12"></div>
                    <div class="col-12 text-left">
                      <a href="/logout"><i class="fa fa-power-off"></i> Đăng xuất</a>
                    </div>				
                  </div>
                  <!-- /.row -->
                </li>
              </ul>
            @else
              <a href="/auth/login">Đăng nhập</a>
            @endif
          </li>
          <!-- Control Sidebar Toggle Button -->
        
        </ul>
      </div>
    </nav>
  </header>