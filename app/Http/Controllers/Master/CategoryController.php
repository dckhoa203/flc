<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
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
            'model' => new Category(),
            'request' => $request,
        ];
        $this->config($config);
        $data = $this->model->web_index($this->request);

        return view('pages.admins.category.index', ['data' => $data]);
    }

    public function create (Request $request)
    {
        return view('pages.admins.category.create');
    }

    public function create_submit(Request $request)
    {
        $config = [
            'model' => new Category(),
            'request' => $request,
        ];
        $this->config($config);
        $data = $this->model->web_insert($this->request);
        
        return redirect('category')->with('success', 'Thêm thành công');
    }

    public function edit($category_id)
    {
        $category = Category::findOrFail($category_id);

        return view('pages.admins.category.edit', ['category' => $category]);
    }

    public function update(Request $request, $category_id)
    {
        $category = Category::find($category_id);
        $category->category_name = $request->get('category_name');
        $category->save();
        
        return redirect('category')->with('success', 'Cập nhật thành công');
    }

    public function destroy($category_id)
    {
        $data = Category::findOrFail($category_id);
        $data->delete();
        // dd($data);
        return back()->with('success', 'Xóa thành công!');
    }
}
