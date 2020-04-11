@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-sm-6 m-auto">
            <form action="{{route('user.update', $user->user_id)}}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="city_name" class="control-label">Email:</label>
                    <input type="text" class="form-control" id="email" name="email" placeholder="" value="{{$user->email}}" disabled>
                </div>
                <div class="form-group">
                    <label for="name" class="control-label">Họ và tên:</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="" value="{{$user->name}}">
                </div>
                <div class="form-group">
                    <label for="tel" class="control-label">Số điện thoại:</label>
                    <input type="text" class="form-control" id="tel" name="tel" placeholder="" value="{{$user->tel}}">
                </div>
                <div class="form-group">
                    <label for="sex" class="control-label">Giới tính:</label>
                    <input type="text" class="form-control" id="sex" name="sex" placeholder="" value="{{$user->sex}}">
                </div>
                <div class="form-group">
                    <label for="dob" class="control-label">Ngày sinh:</label>
                    <input type="text" class="form-control" id="dob" name="dob" placeholder="" value="{{$user->dob}}">
                </div> 
                <div class="form-group">
                    <label for="level" class="control-label">Loại tài khoản:</label>
                    <input type="text" class="form-control" id="level" name="level" placeholder="" value="{{$user->level}}">
                </div> 
                <div class="form-group">
                        <button type="submit" class="btn btn-primary">Lưu</button>
                        <a href="{{route('user.index')}}" class="btn btn-default">Trờ lại</a>
                    </div>
            </form>
        </div>
    </div>    
@endsection