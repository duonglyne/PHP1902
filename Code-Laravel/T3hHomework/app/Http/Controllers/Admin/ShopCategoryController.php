<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Admin\ShopCategoryModel;
use Illuminate\Support\Facades\DB;

class ShopCategoryController extends Controller
{
    public function index(){
        $items = DB::table('shop_category')->paginate(6);
        $data = array();
        $data['cats'] = $items;
        return view('admin.content.shop.category.index', $data);
    }
    public function create(){
        $data = array();
        return view('admin.content.shop.category.submit', $data);
    }
    public function edit($id){
        $item = ShopCategoryModel::find($id);
        $data = array();
        $data['cats'] = $item;
        return view('admin.content.shop.category.edit', $data);
    }

    public function delete($id){
        $item = ShopCategoryModel::find($id);
        $data = array();
        $data['cats'] = $item;
        return view('admin.content.shop.category.delete', $data);
    }


    public function store(Request $request){
        $input = $request->all();
        $item = new ShopCategoryModel();
        // kiểm tra dữ liệu nhập vào
        $validatedData = $request->validate([
            'name' => 'required',
            'slug' => 'required',
            'images' => 'required',
            'intro' => 'required',
            'desc' => 'required',
        ]);

        // gán giá trị mới
        $item->name = $input['name'];
        $item->slug = $input['slug'];
        $item->images = $input['images'];
        $item->intro = $input['intro'];
        $item->desc = $input['desc'];

        $item->save();

         return redirect('/admin/shop/category/');
    }

    public function update(Request $request, $id){
        $item = ShopCategoryModel::find($id);
        $input = $request->all();

        // kiểm tra dữ liệu nhập vào
        $validatedData = $request->validate([
            'name' => 'required',
            'slug' => 'required',
            'images' => 'required',
            'intro' => 'required',
            'desc' => 'required',
        ]);

        // gán giá trị mới
        $item->name = $input['name'];
        $item->slug = $input['slug'];
        $item->images = $input['images'];
        $item->intro = $input['intro'];
        $item->desc = $input['desc'];

        $item->save();

        return redirect('/admin/shop/category');

    }

    public function destroy($id){
        $item = ShopCategoryModel::find($id);
        $item->delete();
        return redirect('/admin/shop/category');
    }


}
