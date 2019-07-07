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
    return view('simpleadmin.homepage.homepage1');
});
//Quản trị
Route::get('category', function () {
    return view('simpleadmin.category.category');
});

Route::get('article', function () {
    return view('simpleadmin.article.article');
});
Route::get('users', function () {
    return view('simpleadmin.users.users');
});
Route::get('banners', function () {
    return view('simpleadmin.banners.banners');
});
Route::get('products', function () {
    return view('simpleadmin.products.products');
});

Route::get('email', function () {
    return view('simpleadmin.email.email');
});

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
