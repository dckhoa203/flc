<aside class="main-sidebar sidebar-dark-primary elevation-4">

     @include('layouts.widgets.admin.logo')

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library --> 
          @if(Session::get('user')->role == 0)
            {{-- Trung tâm --}}
            <li class="nav-item">
              <a href="{{route('center.index')}}" class="nav-link">
                <i class="nav-icon fas fa-school"></i>
                <p>
                  Trung tâm
                </p>
              </a>
            </li>
            {{-- Chi nhánh --}}
            <li class="nav-item">
              <a href="{{route('branch.index')}}" class="nav-link">
                <i class="nav-icon fas fa-code-branch"></i>
                <p>
                  Chi nhánh
                </p>
              </a>
            </li>
            {{-- Khóa học --}}
            <li class="nav-item">
              <a href="{{route('invoice.index')}}" class="nav-link">
                <i class="nav-icon fas fa-file-invoice-dollar"></i>
                <p>
                  Hóa đơn
                </p>
              </a>
            </li>
            {{-- Thể loại --}}
            <li class="nav-item">
              <a href="{{route('category.index')}}" class="nav-link">
                <i class="nav-icon nav-icon fas fa-th"></i>
                <p>
                  Thể loại
                </p>
              </a>
            </li>
            {{-- Đơn vị hành chính --}}
            <li class="nav-item has-treeview">
              <a href="{{route('city.index')}}" class="nav-link">
                <i class="nav-icon fas fa-university"></i>
                <p>
                  Đơn vị hành chính
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="{{route('city.index')}}" class="nav-link">
                    <i class="nav-icon far fa-circle nav-icon"></i>
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
                <i class="nav-icon nav-icon fas fa-blog"></i>
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
                  <a href="{{route('post.create')}}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Tạo bài đăng</p>
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
                <i class="nav-icon fas fa-users"></i>
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
          @endif
          {{-- Cộng tác viên --}}
          @if(Session::get('user')->role == 1)
            {{-- Bài viết --}}
            <li class="nav-item has-treeview">
              <a href="{{route('col.post.index')}}" class="nav-link">
                <i class="nav-icon nav-icon fas fa-blog"></i>
                <p>
                  Bài đăng
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="{{route('col.post.index')}}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Quản lý bài đăng</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="{{route('col.post.create')}}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Tạo bài đăng</p>
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
            {{-- Khóa học --}}
            <li class="nav-item">
              <a href="{{route('col.invoice.index')}}" class="nav-link">
                <i class="nav-icon fas fa-file-invoice-dollar"></i>
                <p>
                  Hóa đơn
                </p>
              </a>
            </li>
          @endif

          @if(Session::get('user')->role == 2)
            {{-- Khóa học --}}
            <li class="nav-item">
              <a href="{{route('mem.index')}}" class="nav-link">
                <i class="nav-icon fa fa-university" aria-hidden="true"></i>
                <p>
                  Khóa học của tôi
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{route('mem.register')}}" class="nav-link">
                <i class="nav-icon fa fa-plus" aria-hidden="true"></i>
                <p>
                  Đăng ký khóa học
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="nav-icon fa fa-commenting-o" aria-hidden="true"></i>
                <p>
                  Quản lý bình luận
                </p>
              </a>
            </li>
          @endif
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>