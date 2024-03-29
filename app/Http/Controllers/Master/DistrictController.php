<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\District;
use App\Models\City;

class DistrictController extends Controller
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
            'model' => new District(),
            'request' => $request,
        ];
        $this->config($config);
        $data = $this->model->web_index($this->request);
       
        return view('pages.admins.district.index', ['data' => $data]);
    }

    public function create (Request $request)
    {
        $city = City::all();
        return view('pages.admins.district.create', ['city' => $city]);
    }

    public function create_submit(Request $request)
    {
        $config = [
            'model' => new District(),
            'request' => $request,
        ];
        $this->config($config);
        $data = $this->model->web_insert($this->request);
        
        return redirect('admin/district')->with('success', 'Thêm thành công');
    }

    public function edit($district_id)
    {
        $district = District::findOrFail($district_id);
        $city = City::all();

        return view('pages.admins.district.edit', ['district' => $district, 'city' => $city]);
    }

    public function update(Request $request, $district_id)
    {
        $district = District::find($district_id);
        $district->district_name = $request->get('district_name');
        $district->city_id = $request->get('city_id');
        $district->save();
        
        return redirect('admin/district')->with('success', 'Cập nhật thành công');
    }

    public function destroy($district_id)
    {
        $data = District::findOrFail($district_id);
        $data->delete();
        
        return back()->with('success', 'Xóa thành công!');
    }
    
    public function get_district (Request $request)
    {
        $config = [
            'model' => new District(),
            'request' => $request,
        ];
        $this->config($config);
        $data = $this->model->web_index($this->request);
       
        return $data;   
    }

    // Lấy district theo city
    public function get_district_city (Request $request)
    {
        $city_id = $request->id;

        $data = District::where('city_id', $city_id)->get();
       
        return $data;
    }
}
