<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Admin\ShopCategoryModel;
use Illuminate\Support\Facades\DB;

class ShopCategoryController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:admin');
    }


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
    public function slugify($str) {
        $str = trim(mb_strtolower($str));
        $str = preg_replace('/(à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ)/', 'a', $str);
        $str = preg_replace('/(è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ)/', 'e', $str);
        $str = preg_replace('/(ì|í|ị|ỉ|ĩ)/', 'i', $str);
        $str = preg_replace('/(ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ)/', 'o', $str);
        $str = preg_replace('/(ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ)/', 'u', $str);
        $str = preg_replace('/(ỳ|ý|ỵ|ỷ|ỹ)/', 'y', $str);
        $str = preg_replace('/(đ)/', 'd', $str);
        $str = preg_replace('/[^a-z0-9-\s]/', '', $str);
        $str = preg_replace('/([\s]+)/', '-', $str);
        return $str;
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
        ]);

        // gán giá trị mới
        $item->name = $input['name'];
        $item->slug = $input['slug'] ? $this->slugify($input['slug']) : $this->slugify($input['name']);
        $item->images = isset($input['images']) ? $input['images'] : '';
        $item->intro = isset($input['intro']) ? $input['intro'] : '';
        $item->desc = isset($input['desc']) ? $input['desc'] : '';
        $item->homepage = isset($input['homepage']) ? (int) $input['homepage'] : 0;

        $item->save();

         return redirect('/admin/shop/category/');
    }

    public function update(Request $request, $id){
        $item = ShopCategoryModel::find($id);
        $input = $request->all();

        // kiểm tra dữ liệu nhập vào
        $validatedData = $request->validate([
            'name' => 'required',
        ]);

        // gán giá trị mới
        $item->name = $input['name'];
        $item->slug = $input['slug'] ? $this->slugify($input['slug']) : $this->slugify($input['name']);
        $item->images = isset($input['images']) ? $input['images'] : '';
        $item->intro = isset($input['intro']) ? $input['intro'] : '';
        $item->desc = isset($input['desc']) ? $input['desc'] : '';
        $item->homepage = isset($input['homepage']) ? (int) $input['homepage'] : 0;

        $item->save();

        return redirect('/admin/shop/category');

    }

    public function destroy($id){
        $item = ShopCategoryModel::find($id);
        $item->delete();
        return redirect('/admin/shop/category');
    }


}
