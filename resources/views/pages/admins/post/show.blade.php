@extends('layouts.admin')

@section('content-header')
<div class="row">
    <div class="col-sm-6">
      <h5 class="m-0 text-dark">Xem bài viết</h5>
    </div><!-- /.col -->
    <div class="col-sm-6">
      <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="#">admin</a></li>
      <li class="breadcrumb-item"><a href="{{route('post.index')}}">post</a></li>
      <li class="breadcrumb-item active">show / {{$data['post_id']}}</li>
      </ol>
    </div><!-- /.col -->
  </div><!-- /.row -->
@endsection

@section('content')
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="white-box">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="table-responsive showContent">
                                <h4>{{$data['title']}}</h4>
                                <p>{{$data['created_at']}}</p>
                                <p>Tác giả: {{$data['user']['name']}} - thể loại: {{$data['category']['category_name']}}</p>
                                <p>$: {{$data['rental']}} đ</p>
                                <p>{{$data['content']}}</p>
                                <br>
                                <p>Lượt xem:<br>
                                Lượt <i class="far fa-thumbs-up"></i>:<br>
                                Lượt <i class="far fa-thumbs-down"></i>:</p>
                            </div>
                        </div>
                    </div>
                {{-- end div col-sm-6 --}}
            </div> 
            {{-- end div row --}}
        {{-- </div> --}}
        {{-- end div white-box --}}
        </div>
        {{-- end div container-fluid --}}
    </div>
    {{-- end div page-wrapper --}}
@endsection
