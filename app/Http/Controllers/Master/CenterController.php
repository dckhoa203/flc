<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Center;

class CenterController extends Controller
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
            'model' => new Center(),
            'request' => $request,
        ];
        $this->config($config);
        $data = $this->model->web_index($this->request);

        return view('pages.admins.center.index', ['data' => $data]);
    }

    public function create (Request $request)
    {
        return view('pages.admins.center.create');
    }

    public function create_submit(Request $request)
    {
        $config = [
            'model' => new Center(),
            'request' => $request,
        ];
        $this->config($config);
        $data = $this->model->web_insert($this->request);
        
        return redirect('center')->with('success', 'Thêm thành công');
    }

    public function edit($center_id)
    {
        $center = Center::findOrFail($center_id);

        return view('pages.admins.center.edit', ['center' => $center]);
    }

    public function update(Request $request, $center_id)
    {
        $center = Center::find($center_id);
        $center->center_name = $request->get('center_name');
        $center->save();
        
        return redirect('center')->with('success', 'Cập nhật thành công');
    }

    public function destroy($center_id)
    {
        $data = Center::findOrFail($center_id);
        $data->delete();
        // dd($data);
        return redirect('center')->with('success', 'Xóa thành công!');
    }
}
