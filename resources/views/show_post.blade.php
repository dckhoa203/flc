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

    <div class="site-section bg-light" id="contact-section">
        <div class="container">
    
            <div class="white-box">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="table-responsive showContent">
                            <h4>{{$data['title']}}</h4>
                            <p>{{$data['created_at']}}</p>
                            <p>Tác giả: {{$data['user']['name']}} - thể loại: {{$data['category']['category_name']}}</p>
                            <p>$: {{$data['rental']}} đ</p>
                            <p>{{$data['content']}}</p>
                            <br>
                            <p>Lượt xem:<br>
                            Lượt thích</i>:<br>
                            Lượt không thích</i>:</p>
                        </div>
                    </div>
                </div>
            {{-- end div col-sm-6 --}}
        </div> 
        </div>
      </div>

    </div>
    <footer class="footer-section bg-white">
      <div class="container">
        <div class="row">
          <div class="col-md-4">
            <h3>Thông tin về chúng tôi</h3>
            <p>Website giới thiệu trung tâm ngoại ngữ</p>
            <p>Điện thoại: +84123456789</p>
            <p>Email: reception@flc.edu.vn</p>
            <p>Website: <a href="{{route('home')}}" target="_blank" >http://flc.edu.vn</a></p>
          </div>
    
          <div class="col-md-3 ml-auto">
            <h3>Liên kết</h3>
            <ul class="list-unstyled footer-links">
              <li><a href="{{route('home')}}">Trang chủ</a></li>
              <li><a href="{{route('home')}}">Khóa học</a></li>
              <li><a href="{{route('home')}}">Trung tâm</a></li>
              <li><a href="{{route('home')}}">Liên hệ</a></li>
            </ul>
          </div>
    
          <div class="col-md-4">
            <h3>Đăng ký</h3>
            <p>Đăng ký ngai để nhận được nhiều khóa học mới, và nhiều ưu đãi hấp dẫn</p>
            <form action="#" class="footer-subscribe">
              <div class="d-flex mb-5">
                <input type="text" class="form-control rounded-0" placeholder="Email">
                <input type="submit" class="btn btn-primary rounded-0" value="Đăng ký">
              </div>
            </form>
          </div>
    
        </div>
    
        <div class="row pt-5 mt-5 text-center">
          <div class="col-md-12">
            <div class="border-top pt-5">
            <p>
        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
        Copyright &copy;<script>document.write(new Date().getFullYear());</script> <a href="{{route('home')}}" target="_blank" >flc.edu.vn</a> | All rights reserved
        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
      </p>
            </div>
          </div>
          
        </div>
      </div>
    </footer>

  </div> <!-- .site-wrap -->

  @include('layouts.widgets.app.js')
    
  </body>
</html>