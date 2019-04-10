<aside class="main-sidebar">
    <!-- sidebar-->
    <section class="sidebar">
      
      <!-- sidebar menu-->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="active">
          <a href="/">
            <i class="fa fa-dashboard"></i> <span>Home</span>
          </a>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-th"></i>
            <span>Khóa Học</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            @foreach($categories as $category)
              <li><a class="fa fa-edit" href="/category/{{ $category->id}}">   {{ $category->name}}</a>
              </li>
              @endforeach
          </ul>
        </li>
        
        <?php if(isset($flag) && $flag != 1){ ?>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-th"></i>
            <span>Category</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            @foreach($categories as $category)
              <li><a href="/category/{{$category->id}}"><i class="fa fa-circle-thin"></i>{{ $category->name }}</a></li>
            @endforeach
          </ul>
        </li>
        <?php } ?>
      </ul>
	 </section>
  </aside>