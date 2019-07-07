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

// Nghịch vớ vẩn trong buổi 1 Laravel

Route::get('/abc', function(){
    echo "chào bạn";
});

Route::get('/def', function(){
    return view('def');
});

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
