@extends('layouts.admin')

@section('content-header')
<div class="row mb-2">
    <div class="col-sm-6">
      <h1 class="m-0 text-dark">Thêm trung tâm ngoại ngữ</h1>
    </div><!-- /.col -->
    <div class="col-sm-6">
      <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="#">admin</a></li>
      <li class="breadcrumb-item"><a href="{{route('center.index')}}">center</a></li>
        <li class="breadcrumb-item active">create</li>
      </ol>
    </div><!-- /.col -->
  </div><!-- /.row -->
@endsection

@section('content')
    <div class="row">
        <div class="col-sm-6 m-auto">
            <form action="{{route('center.create_submit')}}" method="POST">
                @csrf
                <div class="form-group">
                        <label for="center_name" class="control-label">Tên trung tâm:</label>
                        <input type="text" class="form-control" id="center_name" name="center_name" placeholder="Trung tâm ngoại ngữ Đại Học Cần thơ">
                </div> 
                <div class="form-group">
                    <label for="website" class="control-label">Website:</label>
                    <input type="text" class="form-control" id="website" name="website" placeholder="https://cfl.ctu.edu.vn">
                </div>  
                <div class="form-group">
                        <button type="submit" class="btn btn-primary">Lưu</button>
                        <a href="{{route('center.index')}}" class="btn btn-default">Trờ lại</a>
                    </div>
            </form>
        </div>
    </div>    
@endsection