<?php

namespace App\Http\Controllers\Auth\seller;

use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    public function __construct()
    {
        $this->middleware('guest:seller')->except('logout');
    }

    /**
     * Phương thức này trả về view để đăng nhập cho seller
     */
    public function login(){
        return view('seller.auth.login');
    }

    /**
     * Phương thức này dùng để đăng nhập cho seller
     * lấy thông tin từ form có method là POST để xử lý đăng nhập
     */
    public function loginSeller(Request $request){
        $this->validate($request, array(
            'email' => 'required|email',
            'password' => 'required|min:6',
        ));
        // đăng nhập
        if (Auth::guard('seller')->attempt(
            ['email' => $request->email, 'password' => $request->password], $request->remember
        )){
            //nếu đăng nhập thành công thì chuyển hướng sang dashboard của seller
            return redirect()->intended(route('seller.dashboard'));
        }
        //nếu đăng nhập thất bại thì quay trở lại trang đăng nhập
        //với giá trị 2 ô input cũ là email và remember
        return redirect()->back()->withInput($request->only('email','remember'));
    }

    /**
     * Phương thức này để đăng xuất tài khoản của seller
     */

    public function logout(){
        Auth::guard('seller')->logout();

        // chuyển hướng về trang login của seller
        return redirect()->route('seller.auth.login');
    }
}
