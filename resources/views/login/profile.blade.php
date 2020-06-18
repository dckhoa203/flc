@extends('layouts.admin')

{{-- @section('content-header')
<div class="row">
    <div class="col-sm-6">
      <h5 class="m-0 text-dark">Bình luận</h5>
    </div><!-- /.col -->
    <div class="col-sm-6">
      <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="#">admin</a></li>
      <li class="breadcrumb-item"><a href="{{route('comment.index')}}">comment</a></li>
      </ol>
    </div><!-- /.col -->
  </div><!-- /.row -->
@endsection --}}

@section('content')
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <div id="page-wrapper">
        @if($message = Session::get('success'))
            <div class="alert alert-success" role="alert" id='showMessage'
            style="position: fixed;width: 50%;padding: 7px">
                <span>{{$message}}</span>
            </div>
        @endif
        <div class="container-fluid">
            <div class="white-box">
                    <div class="row">
                        <div class="col-sm-12">
                            <br>
                            {{-- <div class="white-box"> --}}
                                <div class="table-responsive showContent">
                                    <table style="font-size:12px" id="myTable" class="table table-striped dataTable no-footer">
                                        <thead>
                                            <tr>
                                                <td><b>Họ tên</b><br>{{$data->name}}</td>
                                                <td><b>Email</b><br>{{$data->email}}</td>
                                                <td><b>SĐT</b><br>{{$data->tel}}</td>
                                                <td><b>Giới tính</b><br>{{$data->sex}}</td>
                                            </tr>
                                            <tr>
                                                <td><b>Ngày sinh</b><br>{{$data->dob}}</td>
                                                <td><b>Địa chỉ</b><br>
                                                    @if($data->district_id != null) 
                                                        {{$data->district->district_name}} - {{$data->district->city->city_name}}
                                                    @endif
                                                </td>
                                                <td><b>Ảnh đại diện</b><br>{{$data->avatar}}</td>
                                                <td><b></b><br></td>
                                            </tr>
                                        </thead>
                                    </table>
                                </div>
                                <br>
                                <div class="form-group">
                                    <a href="{{route('account.index')}}" class="btn btn btn-default">Cập nhật thông tin</a>
                                    &nbsp&nbsp&nbsp&nbsp
                                    <a href="{{route('account.index')}}" class="btn btn btn-default">Đổi mật khẩu</a>
                                </div>
                        </div>
                    </div>
                {{-- end div col-sm-6 --}}
            </div> 
            {{-- end div row --}}
        {{-- </div> --}}
        {{-- end div white-box --}}
        </div>
        {{-- end div container-fluid --}}
    </div>
    {{-- end div page-wrapper --}}
@endsection
