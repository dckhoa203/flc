<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
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
            'model' => new Post(),
            'request' => $request,
        ];
        $this->config($config);
        $data = $this->model->web_index($this->request);
       
        return view('pages.admins.post.index', ['data' => $data]);
    }

    public function create (Request $request)
    {
        return view('pages.admins.post.create');
    }

    public function create_submit(Request $request)
    {
        $config = [
            'model' => new Post(),
            'request' => $request,
        ];
        $this->config($config);
        $data = $this->model->web_insert($this->request);
        
        return back()->with('success', 'Thêm thành công');
    }

    public function edit($post_id)
    {
        $post = Post::findOrFail($post_id);

        return view('pages.admins.post.edit', ['post' => $post]);
    }

    public function update(Request $request, $post_id)
    {
        $post = Post::find($post_id);
        $post->title = $request->get('title');
        $post->content = $request->get('content');
        $post->user_id = $request->get('user_id');
        $post->save();
        
        return back()->with('success', 'Cập nhật thành công');
    }

    public function destroy($post_id)
    {
        $data = Post::findOrFail($post_id);
        $data->delete();
        
        return back()->with('success', 'Xóa thành công!');
    }
}
