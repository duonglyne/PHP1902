<?php

namespace App\Http\Controllers\Admin;

use App\Model\Admin\ContentCategoryModel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class ContentCategoryController extends Controller
{
    public function index(){
        $items = DB::table('content_category')->paginate(6);
        $data = array();
        $data['cats'] = $items;
        return view('admin.content.content.category.index', $data);
    }
    public function create(){
        $data = array();
        return view('admin.content.content.category.submit', $data);
    }
    public function edit($id){
        $item = ContentCategoryModel::find($id);
        $data = array();
        $data['cats'] = $item;
        return view('admin.content.content.category.edit', $data);
    }

    public function delete($id){
        $item = ContentCategoryModel::find($id);
        $data = array();
        $data['cats'] = $item;
        return view('admin.content.content.category.delete', $data);
    }


    public function store(Request $request){
        $input = $request->all();
        $item = new ContentCategoryModel();
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

        return redirect('/admin/content/category/');
    }

    public function update(Request $request, $id){
        $item = ContentCategoryModel::find($id);
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

        return redirect('/admin/content/category');

    }

    public function destroy($id){
        $item = ContentCategoryModel::find($id);
        $item->delete();
        return redirect('/admin/content/category');
    }

}
