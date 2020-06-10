<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Comment;
use App\Models\Post;

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
        
        $data = Comment::orderBy('comment_id', 'DESC')->get();

        $post = Post::where('status', 1)
                ->orderBy('post_id', 'DESC')
                ->get();

        return view('pages.admins.comment.index', compact('data', 'post'));
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
        
        return redirect('admin/comment')->with('success', 'Thêm thành công');
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
        
        return redirect('admin/categogy')->with('success', 'Cập nhật thành công');
    }

    public function destroy($comment_id)
    {
        $data = Comment::findOrFail($comment_id);
        $data->delete();
        // dd($data);
        return back()->with('success', 'Xóa thành công!');
    }

    public function get_data(Request $request){        
        
        $id = $request->id;
        if ($id == -1 ){
            $data = Comment::orderBy('comment_id', 'DESC')->get();
        } else {
            $data = Comment::where('post_id', $id)
                    ->orderBy('comment_id', 'DESC')
                    ->get();
        }

        return view('pages.admins.comment.getdata',['data' => $data ? $data : '']);
    }

    public function show($comment_id)
    {
        $data = Comment::findOrFail($comment_id)->get();

        return view('pages.admins.comment.show', ['data' => $data]);
    }
}
