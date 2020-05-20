@extends('layouts.admin')

@section('content-header')
<div class="row mb-2">
    <div class="col-sm-6">
      <h1 class="m-0 text-dark">Thêm thể loại</h1>
    </div><!-- /.col -->
    <div class="col-sm-6">
      <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="#">admin</a></li>
      <li class="breadcrumb-item"><a href="{{route('category.index')}}">category</a></li>
        <li class="breadcrumb-item active">edit</li>
      </ol>
    </div><!-- /.col -->
  </div><!-- /.row -->
@endsection

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