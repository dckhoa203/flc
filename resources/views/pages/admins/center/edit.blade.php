@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-sm-6 m-auto">
            <form action="{{route('center.update', $center->center_id)}}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="center_id" class="control-label">ID</label>
                    <input type="text" class="form-control" id="center_id" name="center_id" placeholder="" value="{{$center->center_id}}" disabled>
            </div>
                <div class="form-group">
                        <label for="center_name" class="control-label">Tên trung tâm:</label>
                        <input type="text" class="form-control" id="center_name" name="center_name" placeholder="" value="{{$center->center_name}}">
                </div>
                <div class="form-group">
                    <label for="website" class="control-label">Website:</label>
                    <input type="text" class="form-control" id="website" name="website" placeholder="" value="{{$center->website}}">
                </div>   
                <div class="form-group text-right">
                    <button type="submit" class="btn btn-primary">Cập nhật</button>
                    <a href="{{route('center.index')}}" class="btn btn-default">Trở về</a>
                </div>
            </form>
        </div>
    </div>    
@endsection