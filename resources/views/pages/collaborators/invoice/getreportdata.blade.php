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
                <td>{{$item->user[0]->name}}</td>
                <td>{{$item->user[0]->email}}</td>
                <td>{{$item->user[0]->tel}}</td>
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
<script>
    $(document).ready(function() {
        $('#myTable').DataTable();
    });
</script>