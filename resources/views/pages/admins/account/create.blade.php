@extends('layouts.admin')

@section('content-header')
<div class="row mb-2">
    <div class="col-sm-6">
      <h1 class="m-0 text-dark">Tài khoản</h1>
    </div><!-- /.col -->
    <div class="col-sm-6">
      <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="#">admin</a></li>
        <li class="breadcrumb-item"><a href="{{route('account.index')}}">users</a></li>
        <li class="breadcrumb-item active">create</li>
      </ol>
    </div><!-- /.col -->
  </div><!-- /.row -->
@endsection

@section('content')
    <div class="row">
        <div class="col-sm-6 m-auto">
            <form action="{{route('account.create_submit')}}" method="POST">
                @csrf
                <div class="form-group">
                        <label for="email" class="control-label">Email<span style="color: red"> *</span></label>
                        <input type="text" class="form-control" id="email" name="email" placeholder="example.com">
                </div>
                <div class="form-group">
                    <label for="password" class="control-label">Mật khẩu<span style="color: red"> *</span></label>
                    <input type="password" class="form-control" id="password" name="password" placeholder="**********">
                </div> 
                <div class="form-group">
                    <label for="name" class="control-label">Họ và tên</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Nguyen Van Teo">
                </div>
                <div class="form-group">
                    <label for="tel" class="control-label">Số điện thoại</label>
                    <input type="text" class="form-control" id="tel" name="tel" placeholder="0123456789">
                </div>
                <div class="form-group">
                    <label for="sex" class="control-label">Giới tính:</label>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="customRadioInline1" name="sex" class="custom-control-input" value="1" checked>
                        <label class="custom-control-label" for="customRadioInline1">Nam</label>
                      </div>
                      <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="customRadioInline2" name="sex" class="custom-control-input" value="0">
                        <label class="custom-control-label" for="customRadioInline2">Nữ</label>
                      </div>
                </div>
                <div class="form-group">
                    <label for="dob" class="control-label">Ngày sinh</label>
                    <input type="date" class="form-control" id="dob" name="dob" placeholder="2000-01-01">
                </div> 
                <div class="form-group">
                    <label for="level" class="control-label">Loại tài khoản<span style="color: red"> *</span></label>
                    <select name="level"  class="form-control pull-right">
                        <option value="1">Cộng tác viên</option>
                        <option value="2" selected>Thành viên</option>
                    </select>
                </div> 
                <div class="form-group">
                        <button type="submit" class="btn btn-primary">Lưu</button>
                        <a href="{{route('account.index')}}" class="btn btn-default">Trờ lại</a>
                    </div>
            </form>
        </div>
    </div>    
@endsection