@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-sm-6 m-auto">
            <form action="{{route('account.update', $account->user_id)}}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="email" class="control-label">Email:</label>
                    <input type="text" class="form-control" id="email" name="email" placeholder="" value="{{$account->email}}" disabled>
                </div>
                <div class="form-group">
                    <label for="name" class="control-label">Họ và tên:</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="" value="{{$account->name}}">
                </div>
                <div class="form-group">
                    <label for="tel" class="control-label">Số điện thoại:</label>
                    <input type="text" class="form-control" id="tel" name="tel" placeholder="" value="{{$account->tel}}">
                </div>
                <div class="form-group">
                    <label for="sex" class="control-label">Giới tính:</label>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="customRadioInline1" name="sex" class="custom-control-input" value="1" @if($account->sex == 1) selected @endif>
                        <label class="custom-control-label" for="customRadioInline1">Nam</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="customRadioInline2" name="sex" class="custom-control-input" value="0" @if($account->sex == 0) selected @endif>
                        <label class="custom-control-label" for="customRadioInline2">Nữ</label>
                    </div>
                </div>
                <div class="form-group">
                    <label for="dob" class="control-label">Ngày sinh:</label>
                    <input type="date" class="form-control" id="dob" name="dob" placeholder="" value="{{$account->dob}}">
                </div> 
                <div class="form-group">
                    <label for="level" class="control-label">Loại tài khoản:</label>
                    <select name="level"  class="form-control pull-right">
                        <option value="1" @if($account->level == 1) selected @endif>Cộng tác viên</option>
                        <option value="2" @if($account->level == 2) selected @endif>Thành viên</option>
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