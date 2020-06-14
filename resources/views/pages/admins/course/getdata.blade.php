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
<script>
    $(document).ready(function() {
        $('#myTable').DataTable();
    });
</script>