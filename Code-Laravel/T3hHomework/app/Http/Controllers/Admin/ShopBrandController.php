<?php

namespace App\Http\Controllers\Admin;

use App\Model\Admin\ShopBrandModel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class ShopBrandController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index(){
        $items = DB::table('shop_brands')->paginate(6);
        $data = array();
        $data['brands'] = $items;
        return view('admin.content.shop.brands.index', $data);
    }
    public function create(){
        $data = array();
        return view('admin.content.shop.brands.submit', $data);
    }
    public function edit($id){
        $item = ShopBrandModel::find($id);
        $data = array();
        $data['brands'] = $item;
        return view('admin.content.shop.brands.edit', $data);
    }

    public function delete($id){
        $item = ShopBrandModel::find($id);
        $data = array();
        $data['brands'] = $item;
        return view('admin.content.shop.brands.delete', $data);
    }


    public function store(Request $request){
        $input = $request->all();
        $item = new ShopBrandModel();
        // kiểm tra dữ liệu nhập vào
        $validatedData = $request->validate([
            'name' => 'required',
            'link' => 'required',
            'images' => 'required',
            'intro' => 'required',
            'desc' => 'required',
        ]);

        // gán giá trị mới
        $item->name = $input['name'];
        $item->link = $input['link'];
        $item->images = $input['images'];
        $item->intro = $input['intro'];
        $item->desc = $input['desc'];

        $item->save();

        return redirect('/admin/shop/brand/');
    }

    public function update(Request $request, $id){
        $item = ShopBrandModel::find($id);
        $input = $request->all();

        // kiểm tra dữ liệu nhập vào
        $validatedData = $request->validate([
            'name' => 'required',
            'link' => 'required',
            'images' => 'required',
            'intro' => 'required',
            'desc' => 'required',
        ]);

        // gán giá trị mới
        $item->name = $input['name'];
        $item->link = $input['link'];
        $item->images = $input['images'];
        $item->intro = $input['intro'];
        $item->desc = $input['desc'];

        $item->save();

        return redirect('/admin/shop/brand');

    }

    public function destroy($id){
        $item = ShopBrandModel::find($id);
        $item->delete();
        return redirect('/admin/shop/brand');
    }

}
