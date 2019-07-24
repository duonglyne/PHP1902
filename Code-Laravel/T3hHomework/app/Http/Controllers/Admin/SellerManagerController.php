<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class SellerManagerController extends Controller
{
    public function index()
    {
        $sellers = DB::table('sellers')->paginate(6);
        $data = array();
        $data['sellers'] = $sellers;
        return view('admin.content.shop.seller.index', $data);
    }


    public function create()
    {
        $data = array();
        return view('admin.content.shop.seller.submit', $data);
    }


    public function edit($id)
    {
        $seller = SellerModel::find($id);
        $data = array();
        $data['seller'] = $seller;
        return view('admin.content.shop.seller.edit', $data);
    }


    public function delete($id)
    {
        $seller = SellerModel::find($id);
        $data = array();
        $data['seller'] = $seller;
        return view('admin.content.shop.seller.delete', $data);
    }


    public function update(Request $request, $id)
    {
        $item = SellerModel::find($id);
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

        return redirect('/admin/content/shop/seller');
    }

    public function store(Request $request)
    {
        $input = $request->all();
        $item = new SellerModel();

        // kiểm tra dữ liệu nhập vào
        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required',
        ]);

        // gán giá trị mới
        $item->name = $input['name'];
        $item->email = $input['email'];
        $item->save();

        return redirect('/admin/content/shop/seller/');
    }


    public function destroy($id)
    {
        $item = SellerModel::find($id);
        $item->delete();
        return redirect('/admin/content/shop/seller');
    }
}
