<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class LoginController extends Controller
{
    // Hàm khởi tạo.
    public function __construct()
    {
        parent::__construct();
    }
    
    public function index ()
    {
        return view('login.index');
    }

    public function register(Request $request)
    {
        $config = [
            'model' => new User(),
            'request' => $request,
        ];
        $this->config($config);
        $data = $this->model->web_insert($this->request);
        $success =  $data ? 'Đăng ký thành công' : 'Đăng ký không thành công';
        
        return view('login.success', compact('success'));
    }
}
