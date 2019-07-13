<?php

namespace App\Http\Controllers\Admin;

use App\Model\Admin\ContentCategoryModel;
use App\Model\Admin\ContentPostModel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class ContentPostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = DB::table('content_posts')->paginate(6);
        $data = array();
        $data['posts'] = $posts;
        $cats = ContentCategoryModel::all();
        $data['cats'] = $cats;
        return view('admin.content.content.post.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = array();
        $cats = ContentCategoryModel::all();
        $data['cats'] = $cats;
        return view('admin.content.content.post.submit', $data);
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
        $post = ContentPostModel::find($id);
        $data = array();
        $cats = ContentCategoryModel::all();
        $data['cats'] = $cats;
        $data['post'] = $post;
        return view('admin.content.content.post.edit', $data);
    }

    /**
     * Show the form for deleting the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $post = ContentPostModel::find($id);
        $data = array();
        $data['post'] = $post;
        return view('admin.content.content.post.delete', $data);
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
        $item = ContentPostModel::find($id);
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
        $item->cat_id = $input['cat_id'];
        $item->author_id = isset($input['author_id'])? $input['author_id'] : 0;
        $item->view = isset($input['view'])? $input['view'] : 0;

        $item->save();

        return redirect('/admin/content/post');
    }

    public function store(Request $request)
    {
        $input = $request->all();
        $item = new ContentPostModel();

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
        $item->cat_id = $input['cat_id'];
        $item->author_id = isset($input['author_id'])? $input['author_id'] : 0;
        $item->view = isset($input['view'])? $input['view'] : 0;

        $item->save();

        return redirect('/admin/content/post/');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = ContentPostModel::find($id);
        $item->delete();
        return redirect('/admin/content/post');
    }
}
