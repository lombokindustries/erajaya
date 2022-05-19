<a href="{{ url('admin') }}" class="brand-link">
      <img src="{{ asset('assets/images/logo/logo.png') }}" alt="Lombok Industries" class="brand-image img-circle elevation-3">
      <span class="brand-text font-weight-light">Erajaya</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        @if(!empty(Auth::user()))
        <div class="info">
          <a href="#" class="d-block">{{ Auth::user()->firstname }} {{ Auth::user()->lastname }}</a>
        </div>
        @else
        <div class="info">
          <a href="#" class="d-block">Erajaya</a>
        </div>
        @endif
      </div>

      <!-- SidebarSearch Form 
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>-->

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

          @if(Auth::user()->role == "us")
          <li class="nav-item">
            <a href="{{ url('admin/dashboard') }}" class="nav-link {{ Request::segment(2) == "dashboard" || Request::segment(2) == "" ? "active" : "" }}">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          @endif

          @if(Auth::user()->role == "sa")
          <li class="nav-item">
            <a href="{{ url('admin/dashboard') }}" class="nav-link {{ Request::segment(2) == "dashboard" || Request::segment(2) == "" ? "active" : "" }}">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{ url('admin/user/home') }}" class="nav-link {{ Request::segment(2) == "user" ? "active" : "" }}">
              <i class="nav-icon fas fa-users"></i>
              <p>Master User</p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{ url('admin/sa/home') }}" class="nav-link {{ Request::segment(2) == "sa" ? "active" : "" }}">
              <i class="nav-icon fas fa-user-shield"></i>
              <p>Super Admin</p>
            </a>
          </li>
          @endif

          <li class="nav-header">&nbsp;</li>
          <li class="nav-item">
            <a href="{{ url('admin/logout') }}" class="nav-link">
              <i class="nav-icon fas fa-door-open text-danger"></i>
              <p class="text">Sign Out</p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>