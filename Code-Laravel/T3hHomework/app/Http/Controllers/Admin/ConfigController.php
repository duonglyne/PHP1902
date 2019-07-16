<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class ConfigController extends Controller
{
    public function index()
    {
        $menuItems = DB::table('global_settings')->paginate(6);
        $data = array();
        $data['menuItems'] = $menuItems;
        return view('admin.content.global-setting.index', $data);
    }

    public function store(){

    }
}
