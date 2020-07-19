<aside class="main-sidebar sidebar-dark-primary sidebar elevation-3">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
      <span class="brand-text font-weight-bold"><center>Simple Library</center></span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar accent-white">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{ Auth::user()->getPhoto() }}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a class="d-block">{{{ isset(Auth::user()->name) ? Auth::user()->name : Auth::user()->username }}}</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-header">MASTER DATA</li>
          <li class="nav-item">
            <a href="{{ url('mdata/publisher/') }}" class="nav-link {{ Request::is('mdata/publisher*') ? 'active' : '' }}">
              <i class="nav-icon fas fa-industry"></i>
              <p>
                Publisher
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ url('mdata/author/') }}" class="nav-link {{ Request::is('mdata/author*') ? 'active' : '' }}">
              <i class="nav-icon fas fa-user"></i>
              <p>
                Author
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ url('mdata/book/') }}" class="nav-link {{ Request::is('mdata/book*') ? 'active' : '' }}">
              <i class="nav-icon fas fa-book"></i>
              <p>
                Book
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ url('mdata/library/') }}" class="nav-link {{ Request::is('mdata/library*') ? 'active' : '' }}">
              <i class="nav-icon fas fa-book"></i>
              <p>
                Library
              </p>
            </a>
          </li>
          <li class="nav-header">OPERATIONAL</li>
          <li class="nav-item">
            <a href="{{ url('operational/book_library/') }}" class="nav-link {{ Request::is('operational/book_library*') ? 'active' : '' }}">
              <i class="nav-icon fas fa-book"></i>
              <p>
                Book & Library
              </p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>