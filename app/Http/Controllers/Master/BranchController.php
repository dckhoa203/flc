<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Branch;
use App\Models\City;
use App\Models\District;
use App\Models\Center;

class BranchController extends Controller
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
            'model' => new Branch(),
            'request' => $request,
        ];
        $this->config($config);
        $data = $this->model->web_index($this->request);

        return view('pages.admins.branch.index', ['data' => $data]);
    }

    public function create (Request $request)
    {
        $city = City::all();
        $district = District::all();
        $center = Center::all();

        return view('pages.admins.branch.create', compact('city', 'district', 'center'));
    }

    public function create_submit(Request $request)
    {
        $config = [
            'model' => new Branch(),
            'request' => $request,
        ];
        $this->config($config);
        $data = $this->model->web_insert($this->request);
        
        return redirect('admin/branch')->with('success', 'Thêm thành công');
    }

    public function edit($branch_id, Request $request)
    {
        
        $branch = Branch::findOrFail($branch_id);
        $city_id = $branch->district->city->city_id;
        $city = City::all();
        $district = District::where('city_id', $city_id)->get();
        $center = Center::all();
        
        return view('pages.admins.branch.edit', compact('branch', 'district', 'center', 'city'));
    }

    public function update(Request $request, $branch_id)
    {
        $branch = Branch::find($branch_id);
        $branch->address = $request->get('address');
        $branch->district_id = $request->get('district_id');
        $branch->center_id = $request->get('center_id');
        $branch->save();
        
        return redirect('admin/branch')->with('success', 'Cập nhật thành công');
    }

    public function destroy($district_id)
    {
        $data = Branch::findOrFail($district_id);
        $data->delete();
        
        return back()->with('success', 'Xóa thành công!');
    }
}
