@extends('layouts.admin')

@section('content-header')
<div class="row">
    <div class="col-sm-6">
      <h5 class="m-0 text-dark">Phiếu đăng ký</h5>
    </div><!-- /.col -->
    <div class="col-sm-6">
      <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="#">mem</a></li>
        <li class="breadcrumb-item"><a href="{{route('mem.index')}}">course</a></li>
        <li class="breadcrumb-item active">report / {{$data['invoice_id']}}</li>
      </ol>
    </div><!-- /.col -->
  </div><!-- /.row -->
@endsection

@section('content')
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="white-box">
                    <div class="row">
                        <div class="col-sm-8 mx-auto" style="border: 1px solid grey; padding: 30px">
                            <div class="table-responsive showContent" style="font-size:14px">
                                <h4 style="text-align:center">PHIẾU ĐĂNG KÝ</h4>
                                <span>STT: {{$data['invoice_id']}}</span>
                                
                                <p><b>Bên trung tâm</b><br>
                                  Tên trung tâm: {{$data['post'][0]['user']['branch']['branch_name']}}<br>
                                  Người lập: {{$data['post'][0]['user']['name']}}<br>
                                  Đại chỉ: {{$data['post'][0]['user']['branch']['address']}}<br>
                                  SDT: {{$data['post'][0]['user']['branch']['tel']}}
                                </p>
                                <p><b>Bên học viên</b><br>
                                  Họ tên: {{$data['user'][0]['name']}}<br>
                                  Email: {{$data['user'][0]['email']}}<br>
                                  SDT: {{$data['user'][0]['tel']}}<br>
                                </p>

                                <table class="table table-bordered">
                                  <thead>
                                    <tr>
                                      <th>STT</th>
                                      <th>Tên khóa học</th>
                                      <th>Ngày đăng ký</th>
                                      <th>Ngày khai giảng</th>
                                      <th>Gía tiền</th>
                                    </tr>
                                  </thead>
                                  <tbody>
                                    <tr>
                                      <td>1</td>
                                      <td>{{$data['post'][0]['title']}}</td>
                                      <td>{{$data['created_at']}}</td>
                                      <td>{{$data['post'][0]['start']}}</td>
                                      <td>{{$data['post'][0]['rental']}} đ</td>
                                    </tr>
                                  </tbody>
                                </table>
                                <p>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                                  &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                                  Chữ ký trung tâm 
                                  &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                                  &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                                  &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                                  &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                                  &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                                  Chữ ký học viên</p><br><br>
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
