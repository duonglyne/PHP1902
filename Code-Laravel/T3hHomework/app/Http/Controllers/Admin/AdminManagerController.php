<?php

namespace App\Http\Controllers\Admin;

use App\Model\AdminModel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class AdminManagerController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    public function index()
    {
        $admins = DB::table('admins')->paginate(6);
        $data = array();
        $data['admins'] = $admins;
        return view('admin.content.admin.index', $data);
    }


    public function create()
    {
        $data = array();
        return view('admin.content.admin.submit', $data);
    }


    public function edit($id)
    {
        $admin = AdminModel::find($id);
        $data = array();
        $data['admin'] = $admin;
        return view('admin.content.admin.edit', $data);
    }


    public function delete($id)
    {
        $admin = AdminModel::find($id);
        $data = array();
        $data['admin'] = $admin;
        return view('admin.content.admin.delete', $data);
    }


    public function update(Request $request, $id)
    {
        $item = AdminModel::find($id);
        $input = $request->all();

        // kiểm tra dữ liệu nhập vào
        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required',
        ]);

        // gán giá trị mới
        $item->name = $input['name'];
        $item->email = $input['email'];

        $item->save();

        return redirect('/admin/content/users-admin');
    }

    public function store(Request $request)
    {
        $input = $request->all();
        $item = new AdminModel();

        // kiểm tra dữ liệu nhập vào
        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required',
        ]);

        // gán giá trị mới
        $item->name = $input['name'];
        $item->email = $input['email'];
        $item->save();

        return redirect('/admin/content/users-admin/');
    }


    public function destroy($id)
    {
        $item = AdminModel::find($id);
        $item->delete();
        return redirect('/admin/content/users-admin');
    }
}
