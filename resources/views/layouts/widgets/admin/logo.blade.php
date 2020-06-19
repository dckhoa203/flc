<!-- Brand Logo -->
    <a href="{{route('home')}}" class="brand-link">
      <img src="{{asset('src/admin/dist/img/AdminLTELogo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">ForeignLanguageCenter</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <a href="{{route('profile')}}"><img src="{{asset('src/admin/dist/img/user2-160x160.jpg')}}" class="img-circle elevation-2" alt="User Image"></a>
        </div>
        <div class="info">
          <a href="{{route('profile')}}" class="d-block">{{Session::get('user')->name}}</a>
        </div>
      </div>