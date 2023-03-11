  <!-- =============================================== -->

  <!-- Left side column. contains the sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="{{ asset('backend/dist/img/user2-160x160.jpg')}}" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>{{Auth::user()->name}}</p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{route('home')}}"><i class="fa fa-circle-o"></i> Dashboard 1</a></li>
          </ul>
        </li>
        @can('isSuper')
        <li class="treeview">
          <a href="#">
            <i class="fa fa-book"></i> <span>Job</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{route('job')}}"><i class="fa fa-circle-o"></i> All Job</a></li>
            <li><a href="{{route('job.create')}}"><i class="fa fa-circle-o"></i> Add Job</a></li>
          </ul>
        </li>
        @endcan
        <li class="treeview">
          <a href="#">
            <i class="fa fa-check"></i> <span>Job History</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{route('job.myjob')}}"><i class="fa fa-circle-o"></i> Apply Job</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-users"></i> <span>User</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{route('user')}}"><i class="fa fa-circle-o"></i> All User</a></li>
            <li><a href="{{route('user.create')}}"><i class="fa fa-circle-o"></i> Add User</a></li>
          </ul>
        </li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>
