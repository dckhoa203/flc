@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-sm-6 m-auto">
            <form action="{{route('category.create_submit')}}" method="POST">
                @csrf
                <div class="form-group">
                        <label for="category_name" class="control-label">Tên trung tâm</label>
                        <input type="text" class="form-control" id="category_name" name="category_name" placeholder="TOEIC">
                </div>
                <div class="form-group">
                        <button type="submit" class="btn btn-primary">Lưu</button>
                        <a href="{{ route('category.index') }}" class="btn btn-default">Trờ lại</a>
                    </div>
            </form>
        </div>
    </div>    
@endsection