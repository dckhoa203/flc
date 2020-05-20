<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class AccountController extends Controller
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
            'model' => new User(),
            'request' => $request,
        ];
        $this->config($config);
        $data = $this->model->web_index($this->request);

        return view('pages.admins.account.index', ['data' => $data]);
    }

    public function create (Request $request)
    {
        return view('pages.admins.account.create');
    }

    public function create_submit(Request $request)
    {
        $config = [
            'model' => new User(),
            'request' => $request,
        ];
        $this->config($config);
        $data = $this->model->web_insert($this->request);
        
        return redirect('admin/account')->with('success', 'Thêm thành công');
    }

    public function edit($user_id)
    {
        $account = User::findOrFail($user_id);

        return view('pages.admins.account.edit', compact('account'));
    }

    public function update(Request $request, $user_id)
    {
        $user = User::find($user_id);
        $user->level = $request->get('level');
        $user->save();
        
        return redirect('admin/account')->with('success', 'Cập nhật thành công');
    }

    public function destroy($user_id)
    {
        $data = User::findOrFail($user_id);
        $data->delete();
        
        return back()->with('success', 'Xóa thành công!');
    }

    public function collaborator()
    {
        $data = User::where('level', 1)->get();

        return view('pages.admins.account.index', compact('data'));
    }

    public function member()
    {
        $data = User::where('level', 2)->get();

        return view('pages.admins.account.index', compact('data'));
    }
}
