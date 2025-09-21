<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class AdminController extends Controller
{
   public function loginAdmin(){
    if(auth()->check()){
        return redirect()->to('home');
    }
    return view('login');
   }

   
   public function postloginAdmin(Request $request)
{
    $remember = $request->has('remember-me') ? true : false;
    
    if (Auth::attempt([
        'email' => $request->email,
        'password' => $request->password
    ], $remember)) {
        // Kiểm tra xem người dùng đã đăng nhập thành công
        if (Auth::check()) {
            return redirect()->to('home');
        }
    }

    // Nếu đăng nhập không thành công, bạn có thể thực hiện xử lý khác ở đây
    return redirect()->back()->withInput()->withErrors(['login' => 'Email hoặc mật khẩu không chính xác.']);
}

    public function logoutAdmin(Request $request)
{
    Auth::logout();
    return redirect()->to('/admin');
}

        
}
