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
                    <label for="email" class="control-label">Họ tên<span style="color: red"> *</span></label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Do Chi Khoa">
                </div>
                <div class="form-group">
                        <label for="email" class="control-label">Tên đăng nhập<span style="color: red"> *</span></label>
                        <input type="text" class="form-control" id="username" name="username" placeholder="khoado">
                </div>
                <div class="form-group">
                    <label for="password" class="control-label">Mật khẩu<span style="color: red"> *</span></label>
                    <input type="password" class="form-control" id="password" name="password" placeholder="**********">
                </div>
                <div class="form-group">
                    <label for="branch_id" class="control-label">Chi nhánh<span style="color: red"> *</span></label>
                    <select name="branch_id"  class="form-control pull-right">
                        @foreach ($branch as $item)
                            <option value="{{$item->branch_id}}">{{$item->branch_name}}</option>
                        @endforeach
                    </select>
                </div> 
                <div class="form-group">
                    <label for="rolr" class="control-label">Loại tài khoản<span style="color: red"> *</span></label>
                    <select name="role"  class="form-control pull-right">
                        <option value="1">Cộng tác viên</option>
                        {{-- <option value="2" selected>Thành viên</option> --}}
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