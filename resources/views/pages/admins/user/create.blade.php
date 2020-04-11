@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-sm-6 m-auto">
            <form action="{{route('user.create_submit')}}" method="POST">
                @csrf
                <div class="form-group">
                        <label for="city_name" class="control-label">Email:</label>
                        <input type="text" class="form-control" id="email" name="email" placeholder="example.com">
                </div>
                <div class="form-group">
                    <label for="city_name" class="control-label">Mật khẩu:</label>
                    <input type="password" class="form-control" id="password" name="password" placeholder="**********">
                </div> 
                <div class="form-group">
                    <label for="name" class="control-label">Họ và tên:</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Nguyen Van Teo">
                </div>
                <div class="form-group">
                    <label for="tel" class="control-label">Số điện thoại:</label>
                    <input type="text" class="form-control" id="tel" name="tel" placeholder="0123456789">
                </div>
                <div class="form-group">
                    <label for="sex" class="control-label">Giới tính:</label>
                    <input type="text" class="form-control" id="sex" name="sex" placeholder="">
                </div>
                <div class="form-group">
                    <label for="dob" class="control-label">Ngày sinh:</label>
                    <input type="text" class="form-control" id="dob" name="dob" placeholder="2000-01-01">
                </div> 
                <div class="form-group">
                    <label for="level" class="control-label">Loại tài khoản:</label>
                    <input type="text" class="form-control" id="level" name="level" placeholder="1">
                </div> 
                <div class="form-group">
                        <button type="submit" class="btn btn-primary">Lưu</button>
                        <a href="{{route('user.index')}}" class="btn btn-default">Trờ lại</a>
                    </div>
            </form>
        </div>
    </div>    
@endsection