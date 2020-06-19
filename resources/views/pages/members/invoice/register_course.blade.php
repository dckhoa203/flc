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
      <h5 class="m-0 text-dark">Bài đăng</h5>
    </div><!-- /.col -->
    <div class="col-sm-6">
      <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="#">admin</a></li>
      <li class="breadcrumb-item"><a href="{{route('post.index')}}">post</a></li>
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
                                        <select class="form-control" id="select_category">
                                            <option value="-1">All</option>
                                            @foreach($category as $item)
                                                <option value="{{$item->category_id}}">{{$item->category_name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <br>
                                <div class="table-responsive showContent">
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
                                                    <td class="post-summary">{{$item->content}}</td>
                                                    <td>{{$item->user->name}}</td>
                                                    <td>{{$item->category->category_name}}</td>
                                                    <td>{{$item->user->email}}</td>
                                                    {{-- @if (Auth::user()->hasRole('Admin')) --}}
                                                        <td>
                                                            <form action="{{ route('mem.postregister', $item->post_id) }}" method="post" class="delete_form">
                                                                <a  href="{{ action('Member\InvoiceController@show',$item->post_id) }}" data-toggle="tooltip" data-placement="top" title="Xem bài viết">&nbsp;&nbsp;&nbsp;<i class="fas fa-eye" style="color: black; font-size: 17px;"></i></a>
                                                                @csrf
                                                                <button type="submit" class="btn btn-sm btn-icon btn-pure btn-outline delete-row-btn" data-toggle="tooltip" data-placement="top" title="Đăng ký"><i class="fa fa-plus" aria-hidden="true"></i></button>
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
    $(document).ready(function() {
		$('#select_category').on('change',function(){
            const category_id = $('#select_category')[0].value;
            // alert(category_id);
			$.ajax({
				headers: {
          			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          		},
				type: 'post',
				url: "{{route('post.getdata')}}",
                data:{id: category_id},
				success: function(data){
                    $('.showContent').html(data)	
				},
				error: function(data) {
			 	    alert(JSON.stringify(data));
                    // alert('error');
                }
			})
		})
	})

    $(document).ready(function() {
        $('#myTable').DataTable();
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