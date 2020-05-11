@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-sm-6 m-auto">
            <form action="{{route('category.update', $category->category_id)}}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="category_id" class="control-label">ID</label>
                    <input type="text" class="form-control" id="category_id" name="city_id" placeholder="" value="{{$category->category_id}}" disabled>
            </div>
                <div class="form-group">
                        <label for="category_name" class="control-label">Tên tỉnh</label>
                        <input type="text" class="form-control" id="category_name" name="category_name" placeholder="" value="{{$category->category_name}}">
                </div>   
                <div class="form-group text-right">
                    <button type="submit" class="btn btn-primary">Cập nhật</button>
                    <a href="{{route('category.index')}}" class="btn btn-default">Trở về</a>
                </div>
            </form>
        </div>
    </div>    
@endsection