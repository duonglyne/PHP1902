<?php

namespace App\Http\Controllers\Admin;

use App\Model\Admin\MenuItemModel;
use App\Model\Admin\MenuModel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class MenuItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $menuItems = DB::table('menu_items')->paginate(6);
        $data = array();
        $data['menuItems'] = $menuItems;
        return view('admin.content.menu.menu-item.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = array();
        $types = MenuItemModel::getTypeOfMenuItem();
        $data['types'] = $types;
        $data['menus'] = MenuModel::all();
        return view('admin.content.menu.menu-item.submit', $data);
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
        $menuItem = MenuItemModel::find($id);
        $data = array();
        $types = MenuItemModel::getTypeOfMenuItem();
        $data['types'] = $types;
        $data['menus'] = MenuModel::all();
        $data['menuItem'] = $menuItem;
        return view('admin.content.menu.menu-item.edit', $data);
    }

    /**
     * Show the form for deleting the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $menuItem = MenuItemModel::find($id);
        $data = array();
        $data['menuItem'] = $menuItem;
        return view('admin.content.menu.menu-item.delete', $data);
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
        $item = MenuItemModel::find($id);
        $input = $request->all();

        // kiểm tra dữ liệu nhập vào
        $validatedData = $request->validate([
            'name' => 'required',
            'desc' => 'required',
        ]);

        // gán giá trị mới
        $item->name = $input['name'];
        $item->menu_id = $input['menu_id'];
        $item->desc = $input['desc'];
        $item->type = isset($input['type'])? $input['type'] : 0;
        $item->params = isset($input['params'])? $input['params'] : 0;
        $item->icon = isset($input['icon'])? $input['icon'] : 0;
        $item->parent_id = isset($input['parent_id'])? $input['parent_id'] : 0;
        $item->link = isset($input['link'])? $input['link'] : 0;

        $item->save();

        return redirect('/admin/menu-item');
    }

    public function store(Request $request)
    {
        $input = $request->all();
        $item = new MenuItemModel();

        // kiểm tra dữ liệu nhập vào
        $validatedData = $request->validate([
            'name' => 'required',
            'desc' => 'required',
        ]);

        // gán giá trị mới
        $item->name = $input['name'];
        $item->menu_id = $input['menu_id'];
        $item->desc = $input['desc'];
        $item->type = isset($input['type'])? $input['type'] : 0;
        $item->params = isset($input['params'])? $input['params'] : 0;
        $item->icon = isset($input['icon'])? $input['icon'] : 0;
        $item->parent_id = isset($input['parent_id'])? $input['parent_id'] : 0;
        $item->link = isset($input['link'])? $input['link'] : 0;


        $item->save();

        return redirect('/admin/menu-item/');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = MenuItemModel::find($id);
        $item->delete();
        return redirect('/admin/menu-item');
    }
}
