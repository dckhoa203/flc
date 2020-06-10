@extends('layouts.admin')
<style>
.post-summary {
  white-space: nowrap;
  overflow: hidden;
  text-overflow: ellipsis;
  max-width: 200px;
}
</style>
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
    <meta name="csrf-token" content="{{ csrf_token() }}">
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
                                                <tr id="{{$item->post_id}}">
                                                    <td>{{$item->post_id}}</td>
                                                    <td>{{$item->title}}</td>
                                                    <td class="post-summary">{{$item->content}}</td>
                                                    <td>{{$item->user->name}}</td>
                                                    <td>{{$item->category->category_name}}</td>
                                                    <td>{{$item->user->email}}</td>
                                                    {{-- @if (Auth::user()->hasRole('Admin')) --}}
                                                        <td>
                                                            <button type="submit" class="btn btn-sm btn-icon btn-pure btn-outline delete-row-btn approved" post-id="{{$item->post_id}}" data-toggle="tooltip" data-placement="top" title="Duyệt"><i class="fas fa-check"></i></button>
                                                            <button type="submit" class="btn btn-sm btn-icon btn-pure btn-outline delete-row-btn delete removed" post-id="{{$item->post_id}}" data-toggle="tooltip" data-placement="top" title="Xóa"><i class="fal fa-trash-alt fa-lg"></i></button>
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
        // Duyệt bài đăng
        $(document).ready(function () {
            $('.approved').on('click',function(){
                const confirmResult = confirm('Bạn có chắc muốn duyệt bài này không?');
                if (!confirmResult) { // Neu khong dong y
                    return;
                }
                const post_id = $(this).attr('post-id');
                // alert(post_id);
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    type: 'post',
                    url: "{{route('post.approved')}}",
                    data:{id: post_id},
                    dataType: "JSON",
                    success: function(response){
                        if (response.result === 'success') {
                            alert('Duyệt bài thành công!');
                            $(`#${post_id}`).fadeOut();
                        }
                    },
                    error: function(data) {
                        alert(JSON.stringify(data));
                        // alert('error');
                    }
                })
            });
        });

        // Loại bỏ bài đăng
        $(document).ready(function () {
            $('.removed').on('click',function(){
                const confirmResult = confirm('Bạn có chắc muốn xóa bài này không?');
                if (!confirmResult) { // Neu khong dong y
                    return;
                }
                const post_id = $(this).attr('post-id');
                // alert(post_id);
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    type: 'post',
                    url: "{{route('post.removed')}}",
                    data:{id: post_id},
                    dataType: "JSON",
                    success: function(response){
                        if (response.result === 'success') {
                            alert('Xóa bài thành công!');
                            $(`#${post_id}`).fadeOut();
                        }
                    },
                    error: function(data) {
                        alert(JSON.stringify(data));
                        // alert('error');
                    }
                })
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