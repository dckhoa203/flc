<?php

namespace App\Http\Controllers\Collaborator;

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
        $user_id = $request->session()->get('user')->user_id;
        
        $data = Post::where('user_id', $user_id)
                ->orderBy('post_id', 'DESC')
                ->get();
        $category = Category::all();
        
        return view('pages.collaborators.post.index', compact('data', 'category'));
    }

    public function create (Request $request)
    {
        $category = Category::all();

        return view('pages.collaborators.post.create', compact('category'));
    }

    public function create_submit(Request $request)
    {
        $config = [
            'model' => new Post(),
            'request' => $request,
        ];
        $this->config($config);

        $this->request['user_id'] = $request->session()->get('user')->user_id;

        $data = $this->model->web_insert($this->request);
        
        return redirect('col/post')->with('success', 'Thêm thành công');
    }

    public function edit($post_id)
    {
        $post = Post::findOrFail($post_id);
        $category = Category::all();

        return view('pages.collaborators.post.edit', compact('post', 'category'));
    }

    public function update(Request $request, $post_id)
    {
        $post = Post::find($post_id);
        $post->title = $request->get('title');
        $post->content = $request->get('content');
        $post->start = $request->get('start');
        $post->rental = $request->get('rental');
        $post->category_id = $request->get('category_id');
        $post->save();
        
        return redirect('col/post')->with('success', 'Cập nhật thành công');
    }

    public function destroy($post_id)
    {
        $data = Post::findOrFail($post_id);
        $data->delete();
        
        return back()->with('success', 'Xóa thành công!');
    }

    public function get_data(Request $request)
    {        
        $user_id = $request->session()->get('user')->user_id;
        $category_id = $request->id;
        if ($category_id == -1 ){
            $data = Post::where('user_id', $user_id)
                    ->orderBy('post_id', 'DESC')->get();
        } else {
            $data = Post::where([['category_id', $category_id],['user_id', $user_id]])
                    ->orderBy('post_id', 'DESC')
                    ->get();
        }

        return view('pages.collaborators.post.getdata',['data' => $data ? $data : '']);
    }

    public function show($post_id)
    {
        $data = Post::where('post_id', $post_id)->first();

        return view('pages.collaborators.post.show', ['data' => $data]);
    }
}
