<?php

namespace App\Http\Controllers\Admin;

use App\Model\Admin\MenuModel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class MenuController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:admin');

        $location = MenuModel::getMenuLocation();
        view()->share('locations', $location);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $menus = DB::table('menus')->paginate(6);
        $data = array();
        $data['menus'] = $menus;
        return view('admin.content.menu.menu.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = array();
        return view('admin.content.menu.menu.submit', $data);
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
        $menu = MenuModel::find($id);
        $data = array();
        $data['menu'] = $menu;
        return view('admin.content.menu.menu.edit', $data);
    }

    /**
     * Show the form for deleting the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $menu = MenuModel::find($id);
        $data = array();
        $data['menu'] = $menu;
        return view('admin.content.menu.menu.delete', $data);
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
        $item = MenuModel::find($id);
        $input = $request->all();

        // kiểm tra dữ liệu nhập vào
        $validatedData = $request->validate([
            'name' => 'required',
            'slug' => 'required',
            'desc' => 'required',
            'location' => 'required',
        ]);

        // gán giá trị mới
        $item->name = $input['name'];
        $item->slug = $input['slug'];
        $item->desc = $input['desc'];
        $item->location = $input['location'];

        $item->save();

        return redirect('/admin/menu');
    }

    public function store(Request $request)
    {
        $input = $request->all();
        $item = new MenuModel();

        // kiểm tra dữ liệu nhập vào
        $validatedData = $request->validate([
            'name' => 'required',
            'slug' => 'required',
            'desc' => 'required',
            'location' => 'required',
        ]);

        // gán giá trị mới
        $item->name = $input['name'];
        $item->slug = $input['slug'];
        $item->desc = $input['desc'];
        $item->location = $input['location'];


        $item->save();

        return redirect('/admin/menu/');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = MenuModel::find($id);
        $item->delete();
        return redirect('/admin/menu');
    }
}
