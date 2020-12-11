<div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        <img src="{{asset('/img/user2-160x160.jpg')}}" class="img-circle elevation-2" alt="User Image">
      </div>
      <div class="info">
        <a href="#" class="d-block">Alexander Pierce</a>
      </div>
    </div>


    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
             with font-awesome or any other icon font library -->
        <?php
            if(Session::get('page') == 'dashboard'){
                $link_active = 'active';
            }else{
                $link_active = '';
            }
        ?>
        <li class="nav-item">
            <a href="{{route('admin.dashboard')}}" class="nav-link {{ $link_active }}">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>Dashboard</p>
            </a>
        </li>

        <!-- SETTINGS SECTION -->
        @if(Session::get('page') == 'admin_change_password' || Session::get('page') == 'admin_update_details')
        <?php
            $menu_open = 'menu-open';
            $link_active = "active";
        ?>
        @else
        <?php
            $menu_open = "";
            $link_active = "";
        ?>
        @endif
        <li class="nav-item {{ $menu_open }}">
          <a href="#" class="nav-link {{ $link_active }}">
            <i class="nav-icon fas fa-th"></i>
            <p>
              Setting
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
              @if(Session::get('page') == 'admin_change_password')
              <?php $link_active = "active" ?>
              @else
              <?php $link_active = ""; ?>
              @endif
            <li class="nav-item">
            <a href="{{route('admin.change.password')}}" class="nav-link {{ $link_active }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Change Password</p>
              </a>
            </li>
            <li class="nav-item">
                @if(Session::get('page') == 'admin_update_details')
                <?php $link_active = "active"; ?>
                @else
                <?php $link_active = ""; ?>
                @endif
                <a href="{{route('admin.change.details')}}" class="nav-link {{ $link_active }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Admin Details</p>
              </a>
            </li>
          </ul>
        </li>

        <!-- CATALOG SECTION -->
        @if(Session::get('page') == 'sections')
        <?php
            $menu_open = 'menu-open';
            $link_active = "active";
        ?>
        @else
        <?php
            $menu_open = "";
            $link_active = "";
        ?>
        @endif
        <li class="nav-item {{ $menu_open }}">
          <a href="#" class="nav-link {{ $link_active }}">
            <i class="nav-icon fas fa-th"></i>
            <p>
              Catelog
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
              @if(Session::get('page') == 'sections')
              <?php $link_active = "active" ?>
              @else
              <?php $link_active = ""; ?>
              @endif
            <li class="nav-item">
            <a href="{{route('admin.sections')}}" class="nav-link {{ $link_active }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Sections</p>
              </a>
            </li>
          </ul>
        </li>

      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
