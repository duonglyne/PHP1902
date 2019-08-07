<?php

namespace App\Http\Controllers\Admin;

use App\Model\Admin\ShopCategoryModel;
use App\Model\Admin\ShopProductModel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class ShopProductController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:admin');
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = DB::table('shop_product')->paginate(6);
        $data = array();
        $data['products'] = $products;
//        $cats = ShopCategoryModel::all();
//        $data['cats'] = $cats;
        return view('admin.content.shop.product.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = array();
        $cats = ShopCategoryModel::all();
        $data['cats'] = $cats;
        return view('admin.content.shop.product.submit', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = ShopProductModel::find($id);
        $data = array();
        $cats = ShopCategoryModel::all();
        $data['cats'] = $cats;
        $data['product'] = $product;
        return view('admin.content.shop.product.edit', $data);
    }

    /**
     * Show the form for deleting the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $product = ShopProductModel::find($id);
        $data = array();
        $data['product'] = $product;
        return view('admin.content.shop.product.delete', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
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

    public function update(Request $request, $id)
    {
        $item = ShopProductModel::find($id);
        $input = $request->all();

        // kiểm tra dữ liệu nhập vào
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'images' => 'required',
            'priceCore' => 'required|numeric',
            'priceSale' => 'required|numeric',
        ]);

        // gán giá trị mới
        $item->name = $input['name'];
        $item->slug = $input['slug'] ? $this->slugify($input['slug']) : $this->slugify($input['name']);
        $item->images = isset($input['images']) ? json_encode($input['images']) : '';
        $item->intro = isset($input['intro']) ? $input['intro'] : '';
        $item->desc = isset($input['desc']) ? $input['desc'] : '';
        $item->ship_info = isset($input['ship_info']) ? $input['ship_info'] : '';
        $item->additional_information = isset($input['additional_information']) ? $input['additional_information'] : '';
        $item->review = isset($input['review']) ? $input['review'] : '';
        $item->help = isset($input['help']) ? $input['help'] : '';
        $item->priceCore = $input['priceCore'];
        $item->priceSale = $input['priceSale'];
        $item->stock = isset($input['stock']) ? (int) $input['stock'] : 0;
        $item->cat_id = $input['cat_id'];
        $item->homepage = isset($input['homepage']) ? (int) $input['homepage'] : 0;

        $item->save();

        return redirect('/admin/shop/product');
    }

    public function store(Request $request)
    {
        $input = $request->all();
        $item = new ShopProductModel();

        // kiểm tra dữ liệu nhập vào
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'images' => 'required',
            'priceCore' => 'required|numeric',
            'priceSale' => 'required|numeric',
        ]);

        // gán giá trị mới
        $item->name = $input['name'];
        $item->slug = $input['slug'] ? $this->slugify($input['slug']) : $this->slugify($input['name']);
        $item->images = isset($input['images'])? json_encode($input['images']) : "";
        $item->intro = isset($input['intro']) ? $input['intro'] : '';
        $item->desc = isset($input['desc']) ? $input['desc'] : '';
        $item->ship_info = isset($input['ship_info']) ? $input['ship_info'] : '';
        $item->additional_information = isset($input['additional_information']) ? $input['additional_information'] : '';
        $item->review = isset($input['review']) ? $input['review'] : '';
        $item->help = isset($input['help']) ? $input['help'] : '';
        $item->priceCore = $input['priceCore'];
        $item->priceSale = $input['priceSale'];
        $item->stock = isset($input['stock']) ? (int) $input['stock'] : 0;
        $item->cat_id = $input['cat_id'];
        $item->homepage = isset($input['homepage']) ? (int) $input['homepage'] : 0;

        $item->save();

        return redirect('/admin/shop/product/');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }



    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = ShopProductModel::find($id);
        $item->delete();
        return redirect('/admin/shop/product');
    }
}
