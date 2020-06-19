<header class="site-navbar py-4 js-sticky-header site-navbar-target" role="banner">
      
  <div class="container-fluid">
    <div class="d-flex align-items-center">
      <div class="site-logo mr-auto w-25"><a href="{{route('home')}}">ForeignLanguageCenter</a></div>

      <div class="mx-auto text-center">
        <nav class="site-navigation position-relative text-right" role="navigation">
          <ul class="site-menu main-menu js-clone-nav mx-auto d-none d-lg-block  m-0 p-0">
            <li><a href="#home-section" class="nav-link">Trang chủ</a></li>
            <li><a href="#courses-section" class="nav-link">Khóa học</a></li>
            <li><a href="#teachers-section" class="nav-link">Trung tâm</a></li>
            <li><a href="#contact-section" class="nav-link">Liên hệ</a></li>
            {{-- Cộng tác viên --}}
            @if(Session::has('user') == true)
              @if(Session::get('user')->role == 1)
                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true"
                    aria-expanded="false">Quản lý</a>
                  <div class="dropdown-menu dropdown-secondary">
                    <a class="dropdown-item" href="{{route('col.index')}}">Hệ thống quản lý</a>
                    <a class="dropdown-item" href="{{route('col.post.create')}}">Tạo bài đăng</a>
                    <a class="dropdown-item" href="{{route('col.invoice.index')}}">Danh sách đăng ký</a>
                    <a class="dropdown-item" href="{{route('profile')}}">Thoong tin tài khoản</a>
                  </div>
                </li>
              @endif
              {{-- Thành viên --}}
              @if(Session::get('user')->role == 2)
                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true"
                    aria-expanded="false">Quản lý</a>
                  <div class="dropdown-menu dropdown-secondary">
                    <a class="dropdown-item" href="{{route('mem.index')}}">Khóa học của tôi</a>
                    <a class="dropdown-item" href="{{route('mem.register')}}">Đằng ký khóa học</a>
                    <a class="dropdown-item" href="{{route('profile')}}">Thông tin tài khoản</a>
                  </div>
                </li>
              @endif
            @endif
          </ul>
        </nav>
      </div>

      <div class="ml-auto w-15">
        <nav class="site-navigation position-relative text-right" role="navigation">
          <ul class="site-menu main-menu site-menu-dark js-clone-nav mr-auto d-none d-lg-block m-0 p-0">
            {{-- <li class="cta"><a href="#contact-section" class="nav-link"><span>Liên hệ</span></a></li> --}}
            @if(Session::has('user') == false)
              <li class="cta"><a href="{{route('login')}}" class="nav-link"><span>Đăng nhập</span></a></li>
            @else 
              <li class="cta"><a href="{{route('logout')}}" class="nav-link"><span>Đăng xuất</span></a></li>
            @endif
            </ul>
        </nav>
        <a href="#" class="d-inline-block d-lg-none site-menu-toggle js-menu-toggle text-black float-right"><span class="icon-menu h3"></span></a>
      </div>
    </div>
  </div>
  
</header>