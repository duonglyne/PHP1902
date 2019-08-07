<?php

namespace App\Model\Frontend;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class ShopCategoryModel extends Model
{
    public $table = 'shop_category';

    /**
     * @param $cat_id
     * Hàm lấy danh dách sản phẩm nằm trong danh mục
     * có id = $cat_id
     */
    public static function getProducts($cat_id) {

        $products = DB::table('shop_product')->where('cat_id', $cat_id)->paginate(9);
        return $products;
    }
}
