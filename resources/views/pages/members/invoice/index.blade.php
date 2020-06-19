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
      <h5 class="m-0 text-dark">Danh sách lớp</h5>
    </div><!-- /.col -->
    <div class="col-sm-6">
      <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="#">admin</a></li>
      <li class="breadcrumb-item"><a href="{{route('invoice.index')}}">invoice</a></li>
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
                                        <select class="form-control" id="select_status">
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
                                                <th>Tên lớp</th>
                                                <th>Chi nhánh</th>
                                                <th>Ngày khai giảng</th>
                                                <th>Giá</th>
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
                                                    <td>{{$item->post->first()->user->branch->branch_name}}</td>
                                                    <td>{{$item->post->first()->title}}</td>
                                                    <td>{{$item->post->first()->start}}</td>
                                                    <td>{{$item->post->first()->rental}}</td>
                                                    <td>
                                                        @if($item->status == 1) Đăng ký thành công
                                                        @else Chờ xử lý @endif
                                                    </td>
                                                    {{-- <td>{{$item->user->branch->center->center_name}}</td> --}}
                                                    
                                                    {{-- @if (Auth::user()->hasRole('Admin')) --}}
                                                        <td>
                                                            <a  href="{{ action('Member\InvoiceController@report',$item->invoice_id) }}" data-toggle="tooltip" data-placement="top" title="Xem danh sách lớp">&nbsp;&nbsp;&nbsp;<i class="fas fa-eye" style="color: black; font-size: 17px;"></i></a>
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
		$('#select_status').on('change',function(){
            const status = $('#select_status')[0].value;
            // alert(category_id);
			$.ajax({
				headers: {
          			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          		},
				type: 'post',
				url: "{{route('mem.invoice.getdata')}}",
                data:{status: status},
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