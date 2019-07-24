<?php

namespace App\Http\Controllers\Admin;

use App\Model\ShipperModel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class ShipperManagerController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {
        $shippers = DB::table('shippers')->paginate(6);
        $data = array();
        $data['shippers'] = $shippers;
        return view('admin.content.shop.shipper.index', $data);
    }


    public function create()
    {
        $data = array();
        return view('admin.content.shop.shipper.submit', $data);
    }


    public function edit($id)
    {
        $shipper = ShipperModel::find($id);
        $data = array();
        $data['shipper'] = $shipper;
        return view('admin.content.shop.shipper.edit', $data);
    }


    public function delete($id)
    {
        $shipper = ShipperModel::find($id);
        $data = array();
        $data['shipper'] = $shipper;
        return view('admin.content.shop.shipper.delete', $data);
    }


    public function update(Request $request, $id)
    {
        $item = ShipperModel::find($id);
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

        return redirect('/admin/content/shop/shipper');
    }

    public function store(Request $request)
    {
        $input = $request->all();
        $item = new ShipperModel();

        // kiểm tra dữ liệu nhập vào
        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required',
        ]);

        // gán giá trị mới
        $item->name = $input['name'];
        $item->email = $input['email'];
        $item->save();

        return redirect('/admin/content/shop/shipper/');
    }


    public function destroy($id)
    {
        $item = ShipperModel::find($id);
        $item->delete();
        return redirect('/admin/content/shop/shipper');
    }
}
