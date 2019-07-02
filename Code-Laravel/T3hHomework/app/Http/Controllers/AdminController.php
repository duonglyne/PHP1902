<?php
namespace App\Http\Controllers;

use App\Model\AdminModel;
use Illuminate\Http\Request;

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
        return view('admin.auth.register');
    }

    public function store(Request $request){
        //validate dữ liệu được gửi từ form đăng ký
        $this->validate($request, array(
           'name' => 'required',
           'email' => 'required',
           'password' => 'required',
        ));

        // khởi tạo Model để lưu admin mới
        $adminModel = new AdminModel();
        $adminModel->name = $request->name;
        $adminModel->email = $request->email;
        $adminModel->password = bcrypt($request->password);

        $adminModel->save();

        return redirect()->route('admin.auth.login');
    }
}
