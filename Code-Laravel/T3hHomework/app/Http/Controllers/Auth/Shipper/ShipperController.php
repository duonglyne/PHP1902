<?php

namespace App\Http\Controllers\Auth\Shipper;

use App\Model\ShipperModel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ShipperController extends Controller
{
    /**
     * Xây dựng phương thức khởi tạo cho class này
     */
    public function __construct()
    {
        $this->middleware('auth:shipper')->only('index');
    }

    public function index(){
        return view('shipper.dashboard');
    }

    /**
     * Phương thức trả về view dùng để đăng ký tài khoản shipper
     * @return Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create(){
        return view('shipper.auth.register');
    }

    public function store(Request $request){
        //validate dữ liệu được gửi từ form đăng ký
        $this->validate($request, array(
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
        ));

        // khởi tạo Model để lưu shipper mới
        $shipperModel = new ShipperModel();
        $shipperModel->name = $request->name;
        $shipperModel->email = $request->email;
        $shipperModel->password = bcrypt($request->password);

        $shipperModel->save();

        return redirect()->route('shipper.auth.login');
    }
}
