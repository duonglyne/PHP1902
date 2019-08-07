<?php

namespace App\Http\Controllers\Admin;

use App\Model\Admin\ContentPageModel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class ContentPageController extends Controller
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
        $pages = DB::table('content_page')->paginate(6);
        $data = array();
        $data['pages'] = $pages;
        return view('admin.content.content.page.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = array();
        return view('admin.content.content.page.submit', $data);
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
        $page = ContentPageModel::find($id);
        $data = array();
        $data['page'] = $page;
        return view('admin.content.content.page.edit', $data);
    }

    /**
     * Show the form for deleting the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $page = ContentPageModel::find($id);
        $data = array();
        $data['page'] = $page;
        return view('admin.content.content.page.delete', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $item = ContentPageModel::find($id);
        $input = $request->all();

        // kiểm tra dữ liệu nhập vào
        $validatedData = $request->validate([
            'name' => 'required',
            'slug' => 'required',
            'intro' => 'required',
            'desc' => 'required',
        ]);

        // gán giá trị mới
        $item->name = $input['name'];
        $item->slug = $input['slug'] ? $this->slugify($input['slug']) : $this->slugify($input['name']);
        $item->images = $input['images']?$input['images'] : '';
        $item->intro = $input['intro'];
        $item->desc = $input['desc'];
        $item->author_id = isset($input['author_id'])? $input['author_id'] : 0;
        $item->view = isset($input['view'])? $input['view'] : 0;

        $item->save();

        return redirect('/admin/content/page');
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
    public function store(Request $request)
    {
        $input = $request->all();
        $item = new ContentPageModel();

        // kiểm tra dữ liệu nhập vào
        $validatedData = $request->validate([
            'name' => 'required',
            'slug' => 'required',
            'intro' => 'required',
            'desc' => 'required',
        ]);

        // gán giá trị mới
        $item->name = $input['name'];
        $item->slug = $input['slug'] ? $this->slugify($input['slug']) : $this->slugify($input['name']);
        $item->images = $input['images']?$input['images'] : '';
        $item->intro = $input['intro'];
        $item->desc = $input['desc'];
        $item->author_id = isset($input['author_id'])? $input['author_id'] : 0;
        $item->view = isset($input['view'])? $input['view'] : 0;

        $item->save();

        return redirect('/admin/content/page/');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = ContentPageModel::find($id);
        $item->delete();
        return redirect('/admin/content/page');
    }
}
