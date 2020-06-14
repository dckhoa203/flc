<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  @include('layouts.widgets.app.head')

  <body data-spy="scroll" data-target=".site-navbar-target" data-offset="300">
  
  <div class="site-wrap">

    <div class="site-mobile-menu site-navbar-target">
      <div class="site-mobile-menu-header">
        <div class="site-mobile-menu-close mt-3">
          <span class="icon-close2 js-menu-toggle"></span>
        </div>
      </div>
      <div class="site-mobile-menu-body"></div>
    </div>
   
    {{-- Header --}}
    @include('layouts.widgets.app.header')

    {{-- Câu phương châm và form đăng ký --}}
    @include('layouts.widgets.app.slogan')
    
    {{-- Khóa học --}}
    @include('layouts.widgets.app.courses')

    {{-- Programs --}}
    {{-- @include('layouts.widgets.app.programs') --}}

    {{-- Trung tâm --}}
    @include('layouts.widgets.app.teachers')

    {{-- Người sáng lập --}}
    {{-- @include('layouts.widgets.app.founder') --}}

    {{-- Tại sao chọn chúng tôi --}}
    @include('layouts.widgets.app.site-section')

    {{-- Đăng ký tư vấn --}}
    @include('layouts.widgets.app.advisory')
    
    {{-- Footer --}}
    @include('layouts.widgets.app.footer')

  </div> <!-- .site-wrap -->

  @include('layouts.widgets.app.js')
    
  </body>
</html>
