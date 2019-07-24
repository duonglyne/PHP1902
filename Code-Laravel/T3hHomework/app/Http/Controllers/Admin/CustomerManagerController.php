<?php

namespace App\Http\Controllers\Admin;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class CustomerManagerController extends Controller
{


    public function index()
    {
        $users = DB::table('users')->paginate(6);
        $data = array();
        $data['users'] = $users;
        return view('admin.content.shop.customer.index', $data);
    }


    public function create()
    {
        $data = array();
        return view('admin.content.shop.customer.submit', $data);
    }


    public function edit($id)
    {
        $user = User::find($id);
        $data = array();
        $data['user'] = $user;
        return view('admin.content.shop.customer.edit', $data);
    }


    public function delete($id)
    {
        $user = User::find($id);
        $data = array();
        $data['user'] = $user;
        return view('admin.content.shop.customer.delete', $data);
    }


    public function update(Request $request, $id)
    {
        $item = User::find($id);
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

        return redirect('/admin/content/shop/customer');
    }

    public function store(Request $request)
    {
        $input = $request->all();
        $item = new User();

        // kiểm tra dữ liệu nhập vào
        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required',
        ]);

        // gán giá trị mới
        $item->name = $input['name'];
        $item->email = $input['email'];
        $item->save();

        return redirect('/admin/content/shop/customer/');
    }


    public function destroy($id)
    {
        $item = User::find($id);
        $item->delete();
        return redirect('/admin/content/shop/customer');
    }
}
