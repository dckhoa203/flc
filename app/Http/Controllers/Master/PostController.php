<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;

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
        $data = Post::where('status', 1)
                ->orderBy('post_id', 'DESC')
                ->get();

        $category = Category::all();
        
        return view('pages.admins.post.index', compact('data', 'category'));
    }

    public function create (Request $request)
    {
        $category = Category::all();

        return view('pages.admins.post.create', compact('category'));
    }

    public function create_submit(Request $request)
    {
        $config = [
            'model' => new Post(),
            'request' => $request,
        ];
        $this->config($config);
        $data = $this->model->web_insert($this->request);
        
        return redirect('admin/post')->with('success', 'Thêm thành công');
    }

    public function edit($post_id)
    {
        $post = Post::findOrFail($post_id);
        $category = Category::all();

        return view('pages.admins.post.edit', compact('post', 'category'));
    }

    public function update(Request $request, $post_id)
    {
        $post = Post::find($post_id);
        $post->title = $request->get('title');
        $post->content = $request->get('content');
        $post->user_id = $request->get('user_id');
        $post->categogy_id = $request->get('categogy_id');
        $post->save();
        
        return redirect('admin/post')->with('success', 'Cập nhật thành công');
    }

    public function destroy($post_id)
    {
        $data = Post::findOrFail($post_id);
        $data->delete();
        
        return back()->with('success', 'Xóa thành công!');
    }

    public function get_approved() 
    {
        $data = Post::where('status', 0)
                ->orderBy('post_id', 'DESC')
                ->get();

        return view('pages.admins.post.approved', ['data' => $data]);
    }

    public function approved(Request $request)
    {
        $post_id = $request->get('id');
        $data = Post::find($post_id);
        $data->status = 1;
        $data->save();
                
        return response()->json(["result" => "success"]);
    }

    public function removed(Request $request)
    {
        $post_id = $request->get('id');;

        $data = Post::findOrFail($post_id);
        $data->delete();
                
        return response()->json(["result" => "success"]);
    }

    public function get_data(Request $request)
    {        
        
        $id = $request->id;
        if ($id == -1 ){
            $data = Post::where('status', 1)
                    ->orderBy('post_id', 'DESC')->get();
        } else {
            $data = Post::where([['category_id', $id],['status', 1]])
                    ->orderBy('post_id', 'DESC')
                    ->get();
        }

        return view('pages.admins.post.getdata',['data' => $data ? $data : '']);
    }

    public function show($post_id)
    {
        $post = Post::findOrFail($post_id)->first();

        return view('pages.admins.post.show', ['post' => $post]);
    }

}
