<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">AdminLTE 3</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
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
          {{-- Trung tâm --}}
          <li class="nav-item">
            <a href="{{route('center.index')}}" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Trung tâm
              </p>
            </a>
          </li>
          {{-- Chi nhánh --}}
          <li class="nav-item">
            <a href="{{route('branch.index')}}" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Chi nhánh
              </p>
            </a>
          </li>
          {{-- Thể loại --}}
          <li class="nav-item">
            <a href="{{route('category.index')}}" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Thể loại
              </p>
            </a>
          </li>
          {{-- Đơn vị hành chính --}}
          <li class="nav-item has-treeview">
            <a href="{{route('city.index')}}" class="nav-link">
              <i class="nav-icon fas fa-chart-pie"></i>
              <p>
                Đơn vị hành chính
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('city.index')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Tỉnh/ Thành phố</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('district.index')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Quận/ Huyện</p>
                </a>
              </li>
            </ul>
          </li>
          {{-- Bài viết --}}
          <li class="nav-item has-treeview">
            <a href="{{route('post.index')}}" class="nav-link">
              <i class="nav-icon fas fa-chart-pie"></i>
              <p>
                Bài đăng
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('post.index')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Quản lý bài đăng</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('post.get_approved')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Duyệt bài đăng</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('comment.index')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Quản lý bình luận</p>
                </a>
              </li>
            </ul>
          </li>
          {{-- Tài khoản --}}
          <li class="nav-item has-treeview">
            <a href="{{route('account.index')}}" class="nav-link">
              <i class="nav-icon fas fa-chart-pie"></i>
              <p>
                Tài khoản
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('account.index')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Tất cả</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('account.collaborator')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Cộng tác viên</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('account.member')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Thành viên</p>
                </a>
              </li>
            </ul>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>