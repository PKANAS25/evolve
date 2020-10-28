<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
      <img src="/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">Evolve</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="https://ui-avatars.com/api/?name={{ Auth::user()->name }}&color=7F9CF5&background=EBF4FF" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="/user/profile" class="d-block" target="_blank">{{ Auth::user()->name }}</a>
        </div>
      </div>

      <!-- Sidebar Menu -->

      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
           
          <li class="nav-item">
            <a href="{{ route('dashboard') }}" class="nav-link {{ (request()->is('dashboard')) ? 'active' : '' }}">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>Dashboard</p>
            </a>
          </li> 


          {{-- Clients Navigation --}}
          <li class="nav-item has-treeview {{ (Str::startsWith(Route::currentRouteName(),'branches')) ? 'menu-open' : '' }}">
            <a href="#" class="nav-link {{ (Str::startsWith(Route::currentRouteName(),'branches')) ? 'active' : '' }}">
              <i class="nav-icon fas fa-building"></i>
              <p>
                Branches
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('branches/create') }}" class="nav-link {{ request()->is('branches/create') ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon text-info"></i>
                  <p>Add Branch</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/charts/flot.html" class="nav-link">
                  <i class="far fa-circle nav-icon text-info"></i>
                  <p>Branch List</p>
                </a>
              </li>
               
            </ul>
          </li>

          {{-- Employee Navigation --}}
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-users"></i>
              <p>
                Employees
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="pages/charts/chartjs.html" class="nav-link">
                  <i class="far fa-circle nav-icon text-info"></i>
                  <p>Add Employee</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/charts/flot.html" class="nav-link">
                  <i class="far fa-circle nav-icon text-info"></i>
                  <p>Search</p>
                </a>
              </li>
               
            </ul>
          </li>

          {{-- Reports Navigation --}}
           <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-chart-pie"></i>
              <p>
                Reports
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="pages/charts/chartjs.html" class="nav-link">
                  <i class="far fa-circle nav-icon text-info"></i>
                  <p>R1</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/charts/flot.html" class="nav-link">
                  <i class="far fa-circle nav-icon text-info"></i>
                  <p>R2</p>
                </a>
              </li>
               
            </ul>
          </li>
          @canany(['user-manage','role-manage'])
          {{-- User Navigation --}}
          <li class="nav-item has-treeview {{ (Str::startsWith(Route::currentRouteName(),'users')) ? 'menu-open' : '' }} ">
            <a href="#" class="nav-link {{ (Str::startsWith(Route::currentRouteName(),'users')) ? 'active' : '' }}">
              <i class="nav-icon fas fa-users-cog"></i>
              <p>
                Users
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              @can('user-manage')
              <li class="nav-item">
                <a href="{{ route('users/list') }}" class="nav-link {{ request()->is('users/list') ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon text-info"></i>
                  <p>Admins</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('register') }}" class="nav-link">
                  <i class="far fa-circle nav-icon text-info"></i>
                  <p>Register</p>
                </a>
              </li>
              @endcan
              @can('role-manage')
              <li class="nav-item">
                <a href="{{ route('users/roles') }}" class="nav-link {{ (request()->is('users/roles') ? "active" : ((request()->is('users/roles/create') ? "active" : ''))) }}">
                  <i class="far fa-circle nav-icon text-info"></i>
                  <p>Roles</p>
                </a>
              </li>
              @endcan  
            </ul>
          </li>
          @endcan 
            
    

          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon far fa-question-circle"></i>
              <p>
                Help
              </p>
            </a>
          </li>
        </ul>
      </nav>
<!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>