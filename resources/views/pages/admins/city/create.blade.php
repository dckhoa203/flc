@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-sm-6 m-auto">
            <form action="{{route('city.create_submit')}}" method="POST">
                @csrf
                <div class="form-group">
                        <label for="city_name" class="control-label">Tên tỉnh</label>
                        <input type="text" class="form-control" id="city_name" name="city_name" placeholder="Cần Thơ">
                </div>   
                <div class="form-group">
                        <button type="submit" class="btn btn-primary">Lưu</button>
                        <a href="{{route('city.index')}}" class="btn btn-default">Trờ lại</a>
                    </div>
            </form>
        </div>
    </div>    
@endsection