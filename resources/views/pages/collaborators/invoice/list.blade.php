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
                                        <span id="post-id" style="display:none;">{{$post_id}}</span>
                                    </div>
                                </div>
                                <br>
                                <div class="table-responsive showContent">
                                    <table style="font-size:12px" id="myTable" class="table table-striped dataTable no-footer">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Tên học viên</th>
                                                <th>Email</th>
                                                <th>SDT</th>
                                                <th>trạng thái</th>
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
                                                    @if(!empty($item->user[0]))
                                                    <td>{{$item->user[0]->name}}</td>
                                                    <td>{{$item->user[0]->email}}</td>
                                                    <td>{{$item->user[0]->tel}}</td>
                                                    @else
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    @endif
                                                    <td>
                                                        @if($item->status == 1) Đăng ký thành công
                                                        @else Chờ xử lý @endif
                                                    </td>
                                                    {{-- <td id="invoice-id" style="display:none;">{{$item->invoice_id}}</td> --}}
                                                    {{-- @if (Auth::user()->hasRole('Admin')) --}}
                                                    <td>
                                                        @if($item->status == 1)
                                                        <a  href="{{ action('Collaborator\InvoiceController@report',$item->invoice_id) }}" data-toggle="tooltip" data-placement="top" title="Xem chi tiết">&nbsp;&nbsp;&nbsp;<i class="fas fa-eye" style="color: black; font-size: 17px;"></i></a>
                                                        @else
                                                            <form action="{{ route('col.invoice.approved', $item->invoice_id) }}" method="post" class="delete_form">
                                                                <a  href="{{ action('Collaborator\InvoiceController@report',$item->invoice_id) }}" data-toggle="tooltip" data-placement="top" title="Xem chi tiết">&nbsp;&nbsp;&nbsp;<i class="fas fa-eye" style="color: black; font-size: 17px;"></i></a>
                                                                @csrf
                                                                <button type="submit" class="btn btn-sm btn-icon btn-pure btn-outline delete-row-btn" data-toggle="tooltip" data-placement="top" title="Phê duyệt"><i class="fas fa-check"></i></button>
                                                            </form>
                                                        @endif
                                                        
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
            const status = $('#select_course')[0].value;
            const post = "{!! $post_id !!}";
            // alert(post_id);
			$.ajax({
				headers: {
          			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          		},
				type: 'post',
				url: "{{route('col.invoice.getreportdata')}}",
                data:{ status: status, post: post},
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