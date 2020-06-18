<table style="font-size:12px" id="myTable" class="table table-striped dataTable no-footer">
    <thead>
        <tr>
            <th>#</th>
            <th>Tiêu đề</th>
            <th>Nội dung</th>
            <th>Thể loại</th>
            <th>Trạng thái</th>
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
                <td>{{$item->category->category_name}}</td>
                <td>
                    @if($item->status == 0) Chờ phê duyệt
                    @else Đã duyệt @endif
                </td>
                {{-- @if (Auth::user()->hasRole('Admin')) --}}
                    <td>
                        <form action="{{ route('col.post.destroy', $item->post_id) }}" method="post" class="delete_form">
                            <a  href="{{ action('Collaborator\PostController@show',$item->post_id) }}" data-toggle="tooltip" data-placement="top" title="Xem bài viết">&nbsp;&nbsp;&nbsp;<i class="fas fa-eye" style="color: black; font-size: 17px;"></i></a>
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