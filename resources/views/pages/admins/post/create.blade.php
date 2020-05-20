@extends('layouts.admin')

@section('content-header')
<div class="row mb-2">
    <div class="col-sm-6">
      <h1 class="m-0 text-dark">Tạo bài viết</h1>
    </div><!-- /.col -->
    <div class="col-sm-6">
      <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="#">admin</a></li>
        <li class="breadcrumb-item"><a href="{{route('post.index')}}">post</a></li>
        <li class="breadcrumb-item active">create</li>
      </ol>
    </div><!-- /.col -->
  </div><!-- /.row -->
@endsection

@section('content')
    <div class="row">
        <div class="col-sm-6 m-auto">
            <form action="{{route('post.create_submit')}}" method="POST">
                @csrf
                <div class="form-group">
                        <label for="title" class="control-label">Tiêu đề</label>
                        <input type="text" class="form-control" id="title" name="title" placeholder="Tuyển sinh lớp TOEIC">
                </div>
                <div class="form-group">
                    <label for="category_id" class="control-label">Thể loại</label>
                    <select name="category_id"  class="form-control pull-right">
                        @foreach($category as $item)
                            <option value="{{$item->category_id}}">{{$item->category_name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="content" class="control-label">Nội dung:</label>
                    <input type="text" class="form-control" id="content" name="content" placeholder="........">
                </div>
                
                
                <div class="form-group">
                        <button type="submit" class="btn btn-primary">Lưu</button>
                        <a href="{{route('post.index')}}" class="btn btn-default">Trờ lại</a>
                    </div>
            </form>
        </div>
    </div>    
@endsection