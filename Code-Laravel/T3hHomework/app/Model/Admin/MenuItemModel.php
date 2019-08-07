<?php

namespace App\Model\Admin;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class MenuItemModel extends Model
{
    public $table = "menu_items";


    //Lấy vị trí của menu
    public static function getMenuItemByHeader(){
        $menu_header = DB::table('menus')->where('location', 1)->first();

        if (isset($menu_header->id)){
            $menu_items_header = DB::table('menu_items')->where('menu_id',$menu_header->id)->get();
        } else {
            $menu_items_header = array();
        }
        return $menu_items_header;
    }
    public static function getMenuItemByFooter1(){
        $menu_footer1 = DB::table('menus')->where('location', 2)->first();

        if (isset($menu_header->id)){
            $menu_items_footer1 = DB::table('menu_items')->where('menu_id',$menu_footer1->id)->get();
        } else {
            $menu_items_footer1 = array();
        }
        return $menu_items_footer1;
    }
    public static function getMenuItemByFooter2(){
        $menu_footer2 = DB::table('menus')->where('location', 3)->first();

        if (isset($menu_header->id)){
            $menu_items_footer2 = DB::table('menu_items')->where('menu_id',$menu_footer2->id)->get();
        } else {
            $menu_items_footer2 = array();
        }

        return $menu_items_footer2;
    }
    public static function getMenuItemByFooter3(){
        $menu_footer3 = DB::table('menus')->where('location', 4)->first();

        if (isset($menu_header->id)){
            $menu_items_footer3 = DB::table('menu_items')->where('menu_id',$menu_footer3->id)->get();
        } else {
            $menu_items_footer3 = array();
        }
        return $menu_items_footer3;
    }

    // in ra menu theo dạng cha con
    public static function buildMenuHTML($input_categories, &$html, $parent_id = 0, $lvl = 1) {
        if (count($input_categories) > 0) {
            if ($lvl == 1) {
                $html .= "<ul class=\"nav navbar-nav \">";
            } elseif ($lvl == 2) {
                $html .= "<ul class=\"dropdown-menu multi\">
                                <div class=\"row\">
                                    <ul class=\"multi-column-dropdown\">";
            } else {
                // Không hiện
            }

            foreach ($input_categories as $key => $category) {
                if ($category->parent_id == $parent_id) {
                    $category->level = $lvl;

                    if ($category->type == 7) {
                        $menu_link = $category->link;
                    } else {
                        $menu_link = url($category->link);
                    }

                    if ($lvl == 1) {
                        $li_class = (isset($category->total) && ($category->total > 0)) ? 'dropdown ' : '';
                        $html .= '<li class="'.$li_class.'"><a href="'.$menu_link.'" class="hyper" target="_blank"><span>';
                    } elseif ($lvl == 2) {
                        $html .= '<li><a href="'.$menu_link.'" target="_blank"><i class="fa fa-angle-right" aria-hidden="true"></i>';
                    } else {

                    }
                    if ($lvl == 1 || $lvl == 2) {
                        $html .= $category->name;
                    }
                    unset($input_categories[$key]);

                    $new_parent_id = $category->id;

                    if ($lvl == 1 && (isset($category->total) && ($category->total > 0))) {
                        $html .= '<b class="caret"></b>';
                    }

                    $new_level = $lvl + 1;
                    self::buildMenuHTML($input_categories, $html, $new_parent_id, $new_level);

                    if ($lvl == 1) {
                        $html .= '</span></a></li>';
                    } elseif ($lvl == 2) {
                        $html .= '</a></li>';
                    } else {

                    }
                }
            }
            if ($lvl == 1) {
                $html .= "</ul>";
            } elseif ($lvl == 2) {
                $html .= "</ul><div class=\"clearfix\"></div>
                                </div>
                            </ul>";
            } else {
                // Không hiện
            }
        }
    }

    public static function getMenuUlLi($source) {
        $html_menu = '';

        self::buildMenuHTML($source, $html_menu);

        return $html_menu;
    }
    //thuật toán xử lý menu
    public static function outputLevelCategories($input_categories, &$output_categories, $parent_id = 0, $lvl = 1) {

        if (count($input_categories) > 0) {
            foreach ($input_categories as $key =>  $category) {
                $category = (array) $category;
                if ($category['parent_id'] == $parent_id) {
                    $category['level'] = $lvl;
                    $output_categories[] = (array) $category;
                    unset($input_categories[$key]);

                    $new_parent_id = $category['id'];
                    $new_level = $lvl + 1;
                    self::outputLevelCategories($input_categories, $output_categories, $new_parent_id, $new_level);
                }
            }
        }


    }
    // lấy ngoại lệ,
    public static function outputLevelCategoriesExcept($input_categories, &$output_categories, $parent_id = 0, $lvl = 1, $except) {

        if (count($input_categories) > 0) {
            foreach ($input_categories as $key => $category) {
                if ($category['parent_id'] == $parent_id) {
                    $category['level'] = $lvl;
                    if ($category['id'] != $except) {
                        $output_categories[] = (array)$category;
                    }
                    unset($input_categories[$key]);

                    if ($category['id'] != $except)  {
                        $new_parent_id = $category['id'];
                        $new_level = $lvl + 1;
                        self::outputLevelCategoriesExcept($input_categories, $output_categories, $new_parent_id, $new_level, $except);
                    }

                }
            }
        }


    }

    public static function getMenuItemRecursiveExcept($except) {
        $result = array();
        $source = MenuItemModel::all()->toArray();

        self::outputLevelCategoriesExcept($source, $result, 0, 1, $except);

        return $result;
    }

    public static function getMenuItemRecursive() {
        $result = array();
        $source = MenuItemModel::all()->toArray();

        self::outputLevelCategories($source, $result);

        return $result;
    }
    // định nghĩa kiểu cho menu-item

    public static function getTypeOfMenuItem(){
        $types = array();

        $types[1] = "Shop category";
        $types[2] = "Shop product";
        $types[3] = "Content category";
        $types[4] = "Content post";
        $types[5] = "Content page";
        $types[6] = "Content tag";
        $types[7] = "Custom link";
        return $types;
    }
}
