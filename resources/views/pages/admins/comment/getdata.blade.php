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
<script>
    $(document).ready(function() {
        $('#myTable').DataTable();
    });
</script>