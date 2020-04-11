@extends('layouts.admin')
@section('content')
<style>
    body{
        font-size: 12px!important;
    }
    </style>
    <div id="page-wrapper">
            @if($message = Session::get('success'))
            <div class="alert alert-success" role="alert">
                <p>{{$message}}</p>
                <p class="mb-0"></p>
            </div>
            @endif
        <div class="container-fluid">
            <div class="white-box">
                    <div class="row">
                        <div class="col-sm-12">
                            {{-- <div class="white-box"> --}}
                                <h3 class="box-title">Quận Huyện</h3>
                                <br>
                                {{-- @if (Auth::user()->hasRole('Admin')) --}}
                                    <a style="width:80px" href="{{route('district.create')}}" class="btn btn-success waves-effect waves-light m-r-10">Thêm</a>
                                {{-- @endif --}}
                                <br>
                                <br>
                                <br>
                                <div class="table-responsive">
                                    <table style="font-size:12px" id="myTable" class="table table-striped dataTable no-footer">
                                        <thead>
                                            <tr>
                                                <th>ID:</th>
                                                <th>Tên Quận/Huyện:</th>
                                                <th>Tên tỉnh/thành phố:</th>
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
                                                    <td>{{$item['district_id']}}</td>
                                                    <td>{{$item['district_name']}}</td>
                                                    <td>{{$item->city->city_name}}</td>
                                                    {{-- @if (Auth::user()->hasRole('Admin')) --}}
                                                        <td>
                                                            <form action="{{ route('city.destroy', $item->city_id) }}" method="post" class="delete_form">
                                                                <a  href="{{ action('Master\CityController@edit',$item->city_id) }}" data-toggle="tooltip" data-placement="top" title="Chỉnh sửa">&nbsp;&nbsp;&nbsp;<i class="fa fa-pencil text-inverse m-r-10 fa-lg"></i></a>
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
    
@section('script')    
    <script>
        // Sắp xếp
        $(document).ready(function() {
            $('#myTable').DataTable();
        });
        // Họp thoại cảnh báo xóa
        $(document).ready(function () {
            $('.delete_form').on('submit',function(){
                if(confirm('Bạn có muốn xóa Khoa/viện này không??'))
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