<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Customer;
use Illuminate\Support\Facades\DB;



class LoginController extends Controller
{
    public function index(){
        return view('feuser.login');
    }

    public function register(){
        return view('feuser.register');
    }

    public function postRegister(Request $req){
        $req->merge(['password'=>Hash::make($req->password)]);
        try {
            User::create($req->all());
        } catch(\Throwable $th) {
          
        }
        return redirect()->route('feuser.login');

    }
    public function postLogin(Request $req){
        if(Auth::attempt(['email' => $req->email, 'password' => $req->password])){
            // Lưu thông tin đăng nhập vào session
            $req->session()->regenerate();
            return redirect()->route('home');
        }
        return redirect()->back()->with('error', 'Sai Email hoặc mật khẩu');
    }
    
    public function logout() {
        // Đăng xuất người dùng
        Auth::logout();
    
        // Xóa thông tin đăng nhập khỏi session
        session()->forget('login');
    
        // Chuyển hướng người dùng về trang home
        return redirect()->route('home');
    }

    public function Add(){
        return view('feuser.add');
    }

    public function postTTusers(Request $request)
    {
        // Validation
        $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:255',
            'address' => 'required|string|max:255',
        ]);

        // Create or update customer
        $customer = Customer::updateOrCreate(
            ['user_id' => Auth::id()],
            [
                'name' => $request->name,
                'address' => $request->address,
                'phone' => $request->phone,
            ]
        );

        // Redirect back to the customer list page with success message
        return redirect()->route('feuser.ttusers')
            ->with('success', 'Thông tin khách hàng đã được lưu.')
            ->with('newCustomer', $customer);
    }

    public function TTusers()
    {
        $customers = Customer::where('user_id', Auth::id())->get(); // Lấy thông tin khách hàng theo ID người dùng
        return view('feuser.ttusers', compact('customers'));
    }
    public function checkEmail(Request $request)
    {
        $email = $request->input('email');
        $exists = User::where('email', $email)->exists();
        return response()->json(['exists' => $exists]);
    }
    
}
    

