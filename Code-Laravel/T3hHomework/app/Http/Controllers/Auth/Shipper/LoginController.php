<?php

namespace App\Http\Controllers\Auth\shipper;

use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    public function __construct()
    {
        $this->middleware('guest:shipper')->except('logout');
    }

    /**
     * Phương thức này trả về view để đăng nhập cho shipper
     */
    public function login(){
        return view('shipper.auth.login');
    }

    /**
     * Phương thức này dùng để đăng nhập cho shipper
     * lấy thông tin từ form có method là POST để xử lý đăng nhập
     */
    public function loginShipper(Request $request){
        $this->validate($request, array(
            'email' => 'required|email',
            'password' => 'required|min:6',
        ));
        // đăng nhập
        if (Auth::guard('shipper')->attempt(
            ['email' => $request->email, 'password' => $request->password], $request->remember
        )){
            //nếu đăng nhập thành công thì chuyển hướng sang dashboard của shipper
            return redirect()->intended(route('shipper.dashboard'));
//            echo "đăng nhập oke đấy";
        }
        //nếu đăng nhập thất bại thì quay trở lại trang đăng nhập
        //với giá trị 2 ô input cũ là email và remember
//        echo "không được rồi";
        return redirect()->back()->withInput($request->only('email','remember'));
    }

    /**
     * Phương thức này để đăng xuất tài khoản của shipper
     */

    public function logout(){
        Auth::guard('shipper')->logout();

        // chuyển hướng về trang login của shipper
        return redirect()->route('shipper.auth.login');
    }
}
