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
        if($data == false) {
            return back()->with('success', 'Đăng ký thất bại');
        }
        
        return back()->with('success', 'Đăng ký thành công');
    }

    public function login(Request $request){
      $email = $request->email;
      $password = $request->password;
      dd(Auth::attempt(['email' => $email, 'password' =>$password]));
      if( Auth::attempt(['email' => $email, 'password' =>$password])) {
        $user = User::where('email',$email)->first();
        if ($user){
          if ( Hash::check($password,$user->password) ){
            if ( $user->role == 0 ){
              return redirect('admin')->with('success', '');;
            } else if($user->role == 1){
              return redirect('col')->with('success', '');
            } else if($user->role == 2){
              return redirect('mem')->with('success', '');
            } else {
              return redirect('/')->with('success', '');
            }
          }
        }
      }
    }
  
    public function logout(){
      Auth::logout();
      return redirect('/');
    }
}
