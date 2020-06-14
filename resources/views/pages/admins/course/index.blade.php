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
      <h5 class="m-0 text-dark">Danh sách khóa học</h5>
    </div><!-- /.col -->
    <div class="col-sm-6">
      <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="#">admin</a></li>
      <li class="breadcrumb-item"><a href="#">course</a></li>
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
                                        <select class="form-control" id="select_course">
                                            <option value="-1">All</option>
                                            <option value="1">Đăng ký thành công</option>
                                            <option value="0">Chờ xử lý</option>
                                        </select>
                                    </div>
                                </div>
                                <br>
                                <div class="table-responsive showContent">
                                    <table style="font-size:12px" id="myTable" class="table table-striped dataTable no-footer">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>ID học viên</th>
                                                <th>ID Lớp học</th>
                                                <th>Trạng thái</th>
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
                                                    <td>{{$item->user_id}}</td>
                                                    <td>{{$item->post_id}}</td>
                                                    <td>@if($item->status == 1) Đăng ký thành công 
                                                        @else chờ xử lý @endif
                                                    </td>
                                                    {{-- @if (Auth::user()->hasRole('Admin')) --}}
                                                        <td>
                                                            <a  href="{{ action('Master\CourseController@show',$item->course_id) }}" data-toggle="tooltip" data-placement="top" title="Xem chi tiết">&nbsp;&nbsp;&nbsp;<i class="fas fa-eye" style="color: black; font-size: 17px;"></i></a>
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
		$('#select_course').on('change',function(){
            const id = $('#select_course')[0].value;
            // alert(category_id);
			$.ajax({
				headers: {
          			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          		},
				type: 'post',
				url: "{{route('course.getdata')}}",
                data:{id: id},
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