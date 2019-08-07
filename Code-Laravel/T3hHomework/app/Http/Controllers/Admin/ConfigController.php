<?php

namespace App\Http\Controllers\Admin;

use App\Model\Admin\ConfigModell;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class ConfigController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:admin');
    }


    public function index(){

        $items = ConfigModell::all();

        $config = array();
        $config[] = 'web_name';
        $config[] = 'header_logo';
        $config[] = 'footer_logo';
        $config[] = 'intro';
        $config[] = 'desc';

        $default = array();

        /**
         * Tạo mặc định cho mảng config
         */
        foreach ($config as $item_config) {

            if (!isset($default[$item_config])) {
                $default[$item_config] = '';
            }
        }

        /**
         * Lấy từ CSDL ra đè lại mảng $default
         */
        foreach ($items as $item) {

            $key = $item->name;
            $default[$key] = $item->value;
        }


        /**
         * Đây là biến truyền từ controller xuống view
         */
        $data = array();
        $data['configs'] = $default;

        return view('admin.content.global-setting.index', $data);
    }

    public function store(Request $request) {

        $input = $request->all();

        $config = array();
        $config[] = 'web_name';
        $config[] = 'header_logo';
        $config[] = 'footer_logo';
        $config[] = 'intro';
        $config[] = 'desc';

        foreach ($config as $item_config) {
            $record = ConfigModell::where('name', $item_config)->first();

            if (isset($record->id)) {
                // cập nhật khi đã có sẵn trong db
                $item = ConfigModell::find($record->id);
                $item->value = isset($input[$item_config]) ? $input[$item_config] : '';
                $item->default = '';
                $item->save();
            } else {
                // tạo mới trong db
                $item = new ConfigModell();
                $item->name = $item_config;
                $item->value = isset($input[$item_config]) ? $input[$item_config] : '';
                $item->default = '';
                $item->save();
            }
        }



        return redirect('/admin/config');
    }
}
