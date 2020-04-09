<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\City;

class CityController extends Controller
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
            'model' => new City(),
            'request' => $request,
        ];
        $this->config($config);
        $data = $this->model->web_index($this->request);

        return view('pages.admins.city.index', ['data' => $data]);
    }

    public function create (Request $request)
    {
        return view('pages.admins.city.create');
    }

    public function create_submit(Request $request)
    {
        $config = [
            'model' => new City(),
            'request' => $request,
        ];
        $this->config($config);
        $data = $this->model->web_insert($this->request);
        
        return redirect('city')->with('success', 'Thêm thành công');
    }

    public function edit($city_id)
    {
        $city = City::findOrFail($city_id);

        return view('pages.admins.city.edit', ['city' => $city]);
    }

    public function update(Request $request, $city_id)
    {
        $city = City::find($city_id);
        $city->city_name = $request->get('city_name');
        $city->save();
        
        return redirect('city')->with('success', 'Cập nhật thành công');
    }

    public function destroy($city_id)
    {
        $data = City::findOrFail($city_id);
        $data->delete();
        // dd($data);
        return redirect('city')->with('success', 'Xóa thành công!');
    }
}
