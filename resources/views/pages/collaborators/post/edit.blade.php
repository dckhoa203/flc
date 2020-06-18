@extends('layouts.admin')

@section('content-header')
<div class="row mb-2">
    <div class="col-sm-6">
      <h5 class="m-0 text-dark">Sửa bài viết</h5>
    </div><!-- /.col -->
    <div class="col-sm-6">
      <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="#">col</a></li>
        <li class="breadcrumb-item"><a href="{{route('col.post.index')}}">post</a></li>
        <li class="breadcrumb-item active">edit</li>
      </ol>
    </div><!-- /.col -->
  </div><!-- /.row -->
@endsection

@section('content')
    <div class="row">
        <div class="col-sm-11 m-auto">
            <form action="{{route('col.post.update', $post->post_id)}}" method="POST">
                @csrf
                <div class="form-group">
                        <input type="text" class="form-control" id="title" name="title" placeholder="" value="{{$post['title']}}">
                </div>
                <div class="form-group">
                    <select name="category_id"  class="form-control pull-right">
                        @foreach($category as $item)
                            <option value="{{$item->category_id}}" @if($item->category_id == $post->post_id) selected @endif>{{$item->category_name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                  <input type="date" class="form-control" id="start" name="start" placeholder="" value="{{$post['start']}}">
                </div>
                <div class="form-group">
                  <input type="text" class="form-control" id="rental" name="rental" placeholder="" value="{{$post['rental']}}">
                </div>
                <div class="form-group">
                    <div class="mb-3">
                      <textarea class="textarea" placeholder="Nội dung" name="content"
                        style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">{{$post['content']}}</textarea>
                    </div>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Đăng bài</button>
                    <a href="{{route('col.post.index')}}" class="btn btn-default">Trờ lại</a>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('script')
<!-- Bootstrap 4 -->
<script src="{{asset('src/admin/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- Summernote -->
<script src="{{asset('src/admin/plugins/summernote/summernote-bs4.min.js')}}"></script>
<script>
    $(function () {
      // Summernote
      $('.textarea').summernote()
    })
</script>
@endsection

@section('css')
<link rel="stylesheet" href="{{asset('src/admin/plugins/summernote/summernote-bs4.css')}}">
@endsection