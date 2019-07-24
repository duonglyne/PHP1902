<?php
namespace App\Http\Controllers;

use App\Model\AdminModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    /**
     * Xây dựng phương thức khởi tạo cho class này
     */
    public function __construct()
    {
        $this->middleware('auth:admin')->only('index');
    }

    /**
     * Phương thức trả về view khi đăng nhập admin thành công
     * @return Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(){
        return view('admin.dashboard');
    }

    /**
     * Phương thức trả về view dùng để đăng ký tài khoản admin
     * @return Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create(){
        return view('admin.auth.registerForm');
    }

    public function store(Request $request){
        //validate dữ liệu được gửi từ form đăng ký
        $this->validate($request, array([
           'name' => 'required',
           'email' => 'required',
           'password' => 'required|min:6',
            'confirm_password' => 'required|min:6|same:password',],[

            'name.required' => 'Không được để trống trường này',
            'email.required' => 'Không được để trống trường này',
            'password.required' => 'Không được để trống trường này',
            'confirm_password.required' => 'Không được để trống trường này',
            'confirm_password.same' => 'Nhập lại mật khẩu không trùng',
        ]
        ));

        // khởi tạo Model để lưu admin mới
        $adminModel = new AdminModel();
        $adminModel->name = $request->name;
        $adminModel->email = $request->email;
        $adminModel->password = bcrypt($request->password);

        $adminModel->save();

        return redirect()->route('admin.auth.login');
    }

    public function login(){
       // return view('admin.auth.login');
        return view('admin.auth.loginForm');
    }

    public function loginAdmin(Request $request){
        $this->validate($request, array(
            'email' => 'required|email',
            'password' => 'required|min:6',
        ));
        // đăng nhập
        if (Auth::guard('admin')->attempt(
            ['email' => $request->email, 'password' => $request->password], $request->remember
        )){
            //nếu đăng nhập thành công thì chuyển hướng sang dashboard của admin
            return redirect()->intended(route('admin.dashboard'));
        }
        //nếu đăng nhập thất bại thì quay trở lại trang đăng nhập
        //với giá trị 2 ô input cũ là email và remember
        return redirect()->back()->withInput($request->only('email','remember'));
    }

    /**
     * Phương thức này để đăng xuất tài khoản của admin
     */

    public function logout(){
        Auth::logout();

        // chuyển hướng về trang login của admin
        return redirect()->route('admin.auth.login');
    }
}
