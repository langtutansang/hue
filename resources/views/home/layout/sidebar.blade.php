<aside class="main-sidebar">
    <!-- sidebar-->
    <section class="sidebar">
      <!-- sidebar menu-->
      <ul class="sidebar-menu" data-widget="tree">
        <li>
          <a href="/">
            <i class="fa fa-dashboard"></i> <span>Trang chủ</span>
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
              <li><a class="fa fa-edit" href="/category/{{ $category->id}}"> {{ $category->title}}</a>
              </li>
              @endforeach
          </ul>
        </li>
        <li>
          <a href="/forum">
            <i class="fa fa-dashboard"></i> <span>Diễn đàn</span>
          </a>
        </li>
      </ul>
	 </section>
</aside>