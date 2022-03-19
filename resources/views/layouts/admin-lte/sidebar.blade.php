<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="/" class="brand-link">
      <img src="{{url('/admin-lte/dist/img/AdminLTELogo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">AdminLTE 3</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
        @guest
      
        @else    
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
          <div class="image">
              <img src="{{url('/admin-lte/dist/img/avatar.png')}}" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="{{ route('profile.index') }}" class="d-block">{{ Auth::user()->name }}</a>
            </div>
        </div>
        @endguest
        
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          @guest
            <li class="nav-item">
                <a href="{{ route('login') }}" class="nav-link {{ (request()->is('login')) ? 'active' : '' }}">
                <i class="nav-icon fas fa-sign-in-alt"></i>
                <p>
                    Login
                </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('register') }}" class="nav-link {{ (request()->is('register*')) ? 'active' : '' }}">
                <i class="nav-icon fas fa-key"></i>
                <p>
                    Register
                </p>
                </a>
            </li>
          @else
            <li class="nav-item">
              <a href="{{ route('home') }}" class="nav-link {{ (request()->is('home')) ? 'active' : '' }}">
                <i class="nav-icon fas fa-archway"></i>
                <p>
                  Home
                </p>
              </a>
            </li>
            @if (Auth::user()->role->id == 1)
              <li class="nav-item">
                <a href="{{ route('ijtima.index') }}" class="nav-link {{ (request()->is('user*')) ? 'active' : '' }}">
                  <i class="nav-icon fas fa-calendar"></i>
                  <p>
                    Ijtima'
                  </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('user.index') }}" class="nav-link {{ (request()->is('user*')) ? 'active' : '' }}">
                  <i class="nav-icon fas fa-user"></i>
                  <p>
                    User
                  </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('role.index') }}" class="nav-link {{ (request()->is('role*')) ? 'active' : '' }}">
                  <i class="nav-icon fa fa-briefcase"></i>
                  <p>Role</p>
                </a>
              </li>
            @endif
          @endguest
        </ul>
        @auth
        <ul class="profile-panel nav nav-pills nav-sidebar flex-column  mt-3 pb-3 pt-3 mb-3" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-item">
            <a href="{{ route('profile.index') }}" class="nav-link {{ (request()->is('profile*')) ? 'active' : '' }}">
              <i class="nav-icon fas fa-user"></i>
              <p>
                Profile
              </p>
            </a>
          </li>
        </ul>    
        @endauth
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>