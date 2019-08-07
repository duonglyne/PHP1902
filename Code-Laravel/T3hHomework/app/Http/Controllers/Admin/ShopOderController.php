<?php

namespace App\Http\Controllers\Admin;

use App\Model\Admin\ShopOderModel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class ShopOderController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index(){
        $items = DB::table('oders')->paginate(10);

        /**
         * Đây là biến truyền từ controller xuống view
         */
        $data = array();
        $data['orders'] = $items;
        return view('admin.content.shop.oder.index', $data);
    }

    public function edit($id) {
        /**
         * Đây là biến truyền từ controller xuống view
         */
        $data = array();

        $item = ShopOderModel::find($id);
        $data['order'] = $item;

        return view('admin.content.shop.oder.edit', $data);
    }

    public function delete($id) {
        /**
         * Đây là biến truyền từ controller xuống view
         */
        $data = array();

        $item = ShopOderModel::find($id);
        $data['order'] = $item;

        return view('admin.content.shop.oder.delete', $data);
    }

    public function update(Request $request, $id) {

        $input = $request->all();

        $validatedData = $request->validate([
            'customer_name' => 'required',
            'customer_phone' => 'required',
            'customer_email' => 'required',
            'customer_note' => 'required',
            'customer_address' => 'required',
            'customer_city' => 'required',
            'customer_country' => 'required',
            'total_price' => 'required',
            'status' => 'required',
        ]);

        $item = ShopOderModel::find($id);

        $item->customer_name = $input['customer_name'];
        $item->customer_phone = $input['customer_phone'];
        $item->customer_email = $input['customer_email'];
        $item->customer_note = $input['customer_note'];
        $item->customer_address = $input['customer_address'];
        $item->customer_city = $input['customer_city'];
        $item->customer_country = $input['customer_country'];
        $item->total_price = $input['total_price'];
        $item->status = $input['status'];

        $item->save();

        return redirect('/admin/shop/oder');
    }

    public function destroy($id) {
        $item = ShopOderModel::find($id);

        $item->delete();

        return redirect('/admin/shop/oder');
    }
}
