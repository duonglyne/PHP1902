<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('shoppy-admin.homepage.homepage');
});
/**
 * Quản trị danh mục
 */
Route::get('category', function () {
    return view('shoppy-admin.category.category');
});
/**
 * Quản trị bài viết
 */
Route::get('article', function () {
    return view('shoppy-admin.article.article');
});
Route::get('article-review', function () {
    return view('shoppy-admin.article.article_review');
});
/**
 * quản trị người dùng
 */
Route::get('users', function () {
    return view('shoppy-admin.users.users');
});

Route::get('users-admin', function () {
    return view('shoppy-admin.users.users-admin');
});

/**
 * bản đồ
 */
Route::get('maps', function () {
    return view('shoppy-admin.maps.maps');
});
/**
 * Quản trị banners
 */

Route::get('banners', function () {
    return view('shoppy-admin.banners.banners');
});
Route::get('banners-page', function () {
    return view('shoppy-admin.banners.banners-page');
});
/**
 * Quản trị sản phẩm
 */
Route::get('products', function () {
    return view('shoppy-admin.products.products');
});

/**
 * quản trị email
 */

Route::get('email', function () {
    return view('shoppy-admin.email.email');
});

/**
 * Quản trị phân quyền
 */

Route::get('phanquyen', function () {
    return view('simpleadmin.phanquyen.phanquyen');
});





// Nghịch vớ vẩn trong buổi 1 Laravel
Route::get('/formLogin', function(){
   return view('formLogin');
});
Route::get('/formRegister', function(){
    return view('formRegister');
});

// Sau khi sử dụng lệnh php artisan migrate thì sẽ xuất hiện 2 route này

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// Route cho phần admin, với dao diện simpleadmin trong template down về
//Route::get('admin', function(){
//   return view('simpleadmin');
//});

/**
 * Route for shoppy admin
 */



