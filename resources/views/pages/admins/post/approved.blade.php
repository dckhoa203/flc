@extends('layouts.admin')

@section('content-header')
<div class="row">
    <div class="col-sm-6">
      <h5 class="m-0 text-dark">Duyệt bài đăng</h5>
    </div><!-- /.col -->
    <div class="col-sm-6">
      <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="#">admin</a></li>
      <li class="breadcrumb-item"><a href="{{route('post.index')}}">post</a></li>
      <li class="breadcrumb-item active">approved</li>
      </ol>
    </div><!-- /.col -->
  </div><!-- /.row -->
@endsection

@section('content')
    <div id="page-wrapper">
        @if($message = Session::get('success'))
            <div class="alert alert-success" role="alert" id='showMessage'
            style="position: fixed;width: 50%;padding: 7px">
                <span>{{$message}}</span>
            </div>
        @endif
        <div class="container-fluid">
            <div class="white-box">
                    <div class="row">
                        <div class="col-sm-12">
                            {{-- <div class="white-box"> --}}
                                <div class="table-responsive">
                                    <table style="font-size:12px" id="myTable" class="table table-striped dataTable no-footer">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Tiêu đề</th>
                                                <th>Nội dung</th>
                                                <th>Tác giả</th>
                                                <th>Thể loại</th>
                                                <th>Email</th>
                                                {{-- @if (Auth::user()->hasRole('Admin')) --}}
                                                    <th>Chức năng</th>
                                                {{-- @else --}}
                                                    {{-- <th></th> --}}
                                                {{-- @endif --}}
                                            </tr>
                                        </thead>
                                        <tbody  style="font-size: 12px">
                                            @foreach ($data as $item)
                                                <tr>
                                                    <td>{{$item->post_id}}</td>
                                                    <td>{{$item->title}}</td>
                                                    <td>{{$item->content}}</td>
                                                    <td>{{$item->user->name}}</td>
                                                    <td>{{$item->category->category_name}}</td>
                                                    <td>{{$item->user->email}}</td>
                                                    {{-- @if (Auth::user()->hasRole('Admin')) --}}
                                                        <td>
                                                            <form action="{{ route('post.approved', $item->post_id) }}" method="post" class="delete_form">
                                                                {{-- <a  href="{{ action('Master\PostController@approved',$item->post_id) }}" data-toggle="tooltip" data-placement="top" title="Duyệt">&nbsp;&nbsp;&nbsp;<i class="fas fa-check"></i></a> --}}
                                                                @csrf
                                                                <button type="submit" class="btn btn-sm btn-icon btn-pure btn-outline delete-row-btn" data-toggle="tooltip" data-placement="top" title="Duyệt"><i class="fas fa-check"></i></button>
                                                            </form>
                                                        </td>
                                                    {{-- @else --}}
                                                        {{-- <td></td> --}}
                                                    {{-- @endif --}}
    
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
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
    
@section('script')    
    <script>
        // Sắp xếp
        $(document).ready(function() {
            $('#myTable').DataTable();
        });
        // an thong bao
        $(document).ready(function(){
            setTimeout(function(){
                $('#showMessage').hide()            
            },1000)
        });
        // Họp thoại cảnh báo xóa
        $(document).ready(function () {
            $('.delete_form').on('submit',function(){
                if(confirm('Bạn có muốn duyệt bài viết này không?'))
                {
                    return true;
                }
                else
                {
                    return false;
                }
            });
        });
    </script>
@endsection

@section('script')
<script>
$(function () 
    $('[data-toggle="tooltip"]').tooltip();
);
</script>
@endsection