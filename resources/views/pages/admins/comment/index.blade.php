@extends('layouts.admin')

@section('content-header')
<div class="row">
    <div class="col-sm-6">
      <h5 class="m-0 text-dark">Bình luận</h5>
    </div><!-- /.col -->
    <div class="col-sm-6">
      <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="#">admin</a></li>
      <li class="breadcrumb-item"><a href="{{route('comment.index')}}">comment</a></li>
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
                            <div>
                                <div class="d-fle">
                                    <select class="form-control" id="select_post">
                                        <option value="-1">All</option>
                                        @foreach($post as $item)
                                            <option value="{{$item->post_id}}">{{$item->title}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <br>
                            {{-- <div class="white-box"> --}}
                                <div class="table-responsive showContent">
                                    <table style="font-size:12px" id="myTable" class="table table-striped dataTable no-footer">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Nội dung</th>
                                                <th>Tác giả</th>
                                                <th>Email</th>
                                                {{-- @if (Auth::user()->hasRole('Admin')) --}}
                                                    <th>Chức năng</th>
                                                {{-- @else --}}
                                                    {{-- <th></th> --}}
                                                {{-- @endif --}}
                                            </tr>
                                        </thead>
                                        <tbody  style="font-size: 12px">
                                            @foreach ($data as $index => $item)
                                                <tr>
                                                    <td>{{$index + 1}}</td>
                                                    <td>{{$item->content}}</td>
                                                    <td>{{$item->user->name}}</td>
                                                    <td>{{$item->user->email}}</td>
                                                    {{-- @if (Auth::user()->hasRole('Admin')) --}}
                                                        <td>
                                                            <form action="{{ route('comment.destroy', $item->comment_id) }}" method="post" class="delete_form">
                                                                <a  href="{{ action('Master\CommentController@edit',$item->comment_id) }}" data-toggle="tooltip" data-placement="top" title="Chỉnh sửa">&nbsp;&nbsp;&nbsp;<i class="fa fa-pencil text-inverse m-r-10 fa-lg"></i></a>
                                                                @csrf
                                                                <button type="submit" class="btn btn-sm btn-icon btn-pure btn-outline delete-row-btn" data-toggle="tooltip" data-placement="top" title="Xóa"><i class="fal fa-trash-alt fa-lg"></i></button>
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
{{-- 
@section('script')
<script>
$(function () 
    $('[data-toggle="tooltip"]').tooltip();
);
</script>
@endsection --}}

@section('script')
<script>
    $(document).ready(function() {
		$('#select_post').on('change',function(){
            const post_id = $('#select_post')[0].value;
            // alert(post_id);
			$.ajax({
				headers: {
          			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          		},
				type: 'post',
				url: "{{route('comment.getdata')}}",
                data:{id: post_id},
				success: function(data){
                    $('.showContent').html(data)	
				},
				error: function(data) {
			 	alert(JSON.stringify(data));
                    // alert('error');
                }
			});
		})
	})

    // Sắp xếp bảng
    $(document).ready(function() {
        $('#myTable').DataTable();
    });

    // Ẩn thông báo sau 1s
    $(document).ready(function(){
            setTimeout(function(){
                $('#showMessage').hide()            
            },1000)
        });

    // Họp thoại cảnh báo xóa
    $(document).ready(function () {
        $('.delete_form').on('submit',function(){
            if(confirm('Bạn có muốn xóa bài viết này không?'))
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