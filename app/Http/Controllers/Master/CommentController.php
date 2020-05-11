<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Comment;

class CommentController extends Controller
{
    // Hàm khởi tạo.
    public function __construct()
    {
        parent::__construct();
    }

    // Hàm đỗ dữ liệu của một Khoa ra trang index
    public function index (Request $request)
    {
        $config = [
            'model' => new Comment(),
            'request' => $request,
        ];
        $this->config($config);
        $data = $this->model->web_index($this->request);

        return view('pages.admins.comment.index', ['data' => $data]);
    }

    public function create (Request $request)
    {
        return view('pages.admins.comment.create');
    }

    public function create_submit(Request $request)
    {
        $config = [
            'model' => new Comment(),
            'request' => $request,
        ];
        $this->config($config);
        $data = $this->model->web_insert($this->request);
        
        return redirect('comment')->with('success', 'Thêm thành công');
    }

    public function edit($comment_id)
    {
        $comment = Comment::findOrFail($comment_id);

        return view('pages.admins.comment.edit', ['comment' => $comment]);
    }

    public function update(Request $request, $comment_id)
    {
        $comment = Comment::find($comment_id);
        $comment->content = $request->get('content');
        $comment->post_id = $request->get('post_id');
        $comment->user_id = $request->get('user_id');
        $comment->reply_id = $request->get('reply_id');
        $comment->save();
        
        return redirect('categogy')->with('success', 'Cập nhật thành công');
    }

    public function destroy($comment_id)
    {
        $data = Comment::findOrFail($comment_id);
        $data->delete();
        // dd($data);
        return back()->with('success', 'Xóa thành công!');
    }
}
