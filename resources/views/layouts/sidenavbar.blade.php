  <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- Brand Logo -->
      <a href="{{route('home')}}" class="brand-link">
          <img src="{{asset('dist/img/AdminLTELogo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
              style="opacity: .8">
          <span class="brand-text font-weight-light">Security Cards Control</span>
      </a>

      <!-- Sidebar -->
      <div class="sidebar">
          <!-- Sidebar user panel (optional) -->
          <div class="user-panel mt-3 pb-3 mb-3 d-flex">
              <div class="image">
                  @if(!isset(Auth::user()->image))
                  <img src="{{asset('dist/img/user2-160x160.jpg')}}" class="img-circle elevation-2" alt="User Image">
                  @else
                  <img src="{{asset('media/users/images')}}" class="img-circle elevation-2" alt="User Image">
                  @endif
              </div>
              <div class="info">
                  <a href="#" class="d-block">{{ Auth::user()->name }}</a>
              </div>
          </div>

          <!-- SidebarSearch Form -->
          <div class="form-inline">
              <div class="input-group" data-widget="sidebar-search">
                  <input class="form-control form-control-sidebar" type="search" placeholder="Search"
                      aria-label="Search">
                  <div class="input-group-append">
                      <button class="btn btn-sidebar">
                          <i class="fas fa-search fa-fw"></i>
                      </button>
                  </div>
              </div>
          </div>

          <!-- Sidebar Menu -->
          <nav class="mt-2">
              <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                  data-accordion="false">
                  <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                  <li class="nav-item">
                      <a href="#" class="nav-link">
                          <i class="nav-icon fas fa-tachometer-alt"></i>
                          <p>
                              Managemaent
                              <i class="right fas fa-angle-left"></i>
                          </p>
                      </a>
                      <ul class="nav nav-treeview">
                          <li class="nav-item">
                              <a href="{{route('vps.index')}}" class="nav-link">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>Vps</p>
                              </a>
                          </li>
                          <li class="nav-item">
                              <a href="{{route('areas.index')}}" class="nav-link">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>Areas</p>
                              </a>
                          </li>
                          <li class="nav-item">
                              <a href="{{route('employees.index')}}" class="nav-link">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>Employees</p>
                              </a>
                          </li>
                      </ul>
                  </li>
                  <li class="nav-item">
                      <a href="#" class="nav-link">
                          <i class="nav-icon fa fa-id-card"></i>
                          <p>
                              Access Cards Requests
                              <i class="right fas fa-angle-left"></i>
                          </p>
                      </a>
                      <ul class="nav nav-treeview">
                          <li class="nav-item">
                              <a href="{{route('requests.pending')}}" class="nav-link">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>Pinding Requests</p>
                              </a>
                          </li>
                          <li class="nav-item">
                              <a href="{{route('requests.approved')}}" class="nav-link">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>Approved Requests</p>
                              </a>
                          </li>
                          <li class="nav-item">
                              <a href="{{route('requests.index')}}" class="nav-link">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>Archive</p>
                              </a>
                          </li>
                      </ul>
                  </li>

                  <li class="nav-header">EXAMPLES</li>
              </ul>
          </nav>
          <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
  </aside>
