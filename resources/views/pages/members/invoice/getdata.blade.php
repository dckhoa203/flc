<table style="font-size:12px" id="myTable" class="table table-striped dataTable no-footer">
    <thead>
        <tr>
            <th>#</th>
            <th>Tên lớp</th>
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
<script>
    $(document).ready(function() {
        $('#myTable').DataTable();
    });
</script>