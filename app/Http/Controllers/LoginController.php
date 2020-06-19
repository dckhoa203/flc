<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
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
        $this->request['password'] =  Hash::make($request->password);
        $data = $this->model->web_insert($this->request);
        
        return back()->with('success', 'Đăng ký thành công');
    }

    public function login(Request $request){
      
      $username = $request->get('username');
      $password = $request->get('password');

      if( Auth::attempt(['username' => $username, 'password' =>$password]) == true) {
        $user = User::where('username',$username)->first();
        
        if ($user){
          if ( Hash::check($password,$user->password) == true){
            $request->session()->put('user', $user);
            if ( $user->role == 0 ){
              return redirect('admin');
            } elseif($user->role == 1) {
              return redirect('col');
            } else {
              return redirect('mem');
            }
          }
        }
      }

      return back();
    }
  
    public function logout(Request $request){
      $request->session()->forget('user');
      return redirect('/');
    }

    public function profile(Request $request)
    {
        $user_id = $request->session()->get('user')->user_id;
        $data = User::where('user_id', $user_id)->first();
        return view('login.profile', compact('data'));
    }

    public function postprofile(Request $request){
      // $user_id = $request->session()->get('user')->user_id;

      // $user = User::findOrFail($user_id);
      
  }
}
