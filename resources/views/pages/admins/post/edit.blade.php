@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-sm-6 m-auto">
            <form action="{{route('post.update', $post->post_id)}}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="district_id" class="control-label">ID:</label>
                <input type="text" class="form-control" id="post_id" name="post_id" placeholder="" value="{{$post->post_id}}" disabled>
                </div>
                <div class="form-group">
                        <label for="title" class="control-label">Tiêu đề:</label>
                        <input type="text" class="form-control" id="title" name="title" placeholder="" value="{{$post->title}}">
                </div>
                <div class="form-group">
                    <label for="content" class="control-label">Nội dung:</label>
                    <input type="text" class="form-control" id="content" name="content" placeholder="" value="{{$post->content}}">
                </div>
                
                
                <div class="form-group">
                        <button type="submit" class="btn btn-primary">Lưu</button>
                        <a href="{{route('post.index')}}" class="btn btn-default">Trờ lại</a>
                    </div>
            </form>
        </div>
    </div>    
@endsection