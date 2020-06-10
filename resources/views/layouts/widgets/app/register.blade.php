<div class="col-lg-5 ml-auto" data-aos="fade-up" data-aos-delay="500">
    <form action="{{route('register')}}" method="post" class="form-box">
      @csrf
      <h3 class="h4 text-black mb-4">Đăng ký</h3>
      <div class="form-group">
        <input type="text" class="form-control" name="name" placeholder="Họ tên" required>
      </div>
      <div class="form-group">
        <input type="text" class="form-control" name="email" placeholder="Email" required>
      </div>
      <div class="form-group">
        <input type="password" class="form-control" name="password" placeholder="Mật khẩu" required>
      </div>
      <div class="form-group mb-4">
        <input type="password" class="form-control" name="re-pass" placeholder="Nhập lại mật khẩu" required>
      </div>
      <div class="form-group">
        <input type="submit" class="btn btn-primary btn-pill" value="Đăng ký">
      </div>
    </form>

  </div>