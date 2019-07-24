<?php

namespace App\Model\Admin;

use Illuminate\Database\Eloquent\Model;

class MenuModel extends Model
{
    public $table = "menus";

    public static function getMenuLocation(){
        $location = array();

        $location[1] = 'Header Menu';
        $location[2] = 'Footer Menu 1';
        $location[3] = 'Footer Menu 2';
        $location[4] = 'Footer Menu 3';

        return $location;
    }


}
