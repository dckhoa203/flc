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
                <td>{{$item->status}}</td>
                {{-- <td id="invoice-id" style="display:none;">{{$item->invoice_id}}</td> --}}
                {{-- @if (Auth::user()->hasRole('Admin')) --}}
                    <td>
                        <a  href="{{ action('Master\InvoiceController@report',$item->invoice_id) }}" data-toggle="tooltip" data-placement="top" title="Xem chi tiết">&nbsp;&nbsp;&nbsp;<i class="fas fa-eye" style="color: black; font-size: 17px;"></i></a>
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