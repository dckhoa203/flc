@extends('layouts.admin')

@section('content-header')
<div class="row mb-2">
    <div class="col-sm-6">
      <h1 class="m-0 text-dark">Sửa Tỉnh / Thành phố</h1>
    </div><!-- /.col -->
    <div class="col-sm-6">
      <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="#">admin</a></li>
        <li class="breadcrumb-item"><a href="{{route('city.index')}}">city</a></li>
        <li class="breadcrumb-item active">edit</li>
      </ol>
    </div><!-- /.col -->
  </div><!-- /.row -->
@endsection

@section('content')
    <div class="row">
        <div class="col-sm-6 m-auto">
            <form action="{{route('city.update', $city->city_id)}}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="city_id" class="control-label">ID</label>
                    <input type="text" class="form-control" id="city_id" name="city_id" placeholder="" value="{{$city->city_id}}" disabled>
            </div>
                <div class="form-group">
                        <label for="city_name" class="control-label">Tên tỉnh</label>
                        <input type="text" class="form-control" id="city_name" name="city_name" placeholder="" value="{{$city->city_name}}">
                </div>   
                <div class="form-group text-right">
                    <button type="submit" class="btn btn-primary">Cập nhật</button>
                    <a href="{{route('city.index')}}" class="btn btn-default">Trở về</a>
                </div>
            </form>
        </div>
    </div>    
@endsection