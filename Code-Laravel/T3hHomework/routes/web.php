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
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

/**
 * Route for administrator
 */

Route::prefix('admin')->group(function (){
    // gom nhóm các route cho phần admin

    // url.com/admin/
    Route::get('/', 'AdminController@index')->name('admin.dashboard');

    /**
     * url.com/admin/dashboard/
     * Sau khi đăng nhập thành công
     */
    Route::get('dashboard', 'AdminController@index')->name('admin.dashboard');

    /**
     * url.com/admin/register
     * route trả về view đăng ký tài khoản admin
     */

    Route::get('register', 'AdminController@create')->name('admin.register');

    /**
     *url.com/admin/register
     * đây là phương thức post
     * Route để đăng ký tài khoản admin từ form POST
     */
    Route::post('register', 'AdminController@store')->name('admin.register.store');

    /**
     * url.com/admin/login
     * route trả về view đăng nhập admin
     */

    Route::get('login', 'Auth\Admin\LoginController@login')->name('admin.auth.login');


    /**
     * url.com/admin/login
     * route xử lý quá trình đăng nhập admin
     */

    Route::post('login', 'Auth\Admin\LoginController@loginAdmin')->name('admin.auth.loginAdmin');

    /**
     * method POST
     * Route dùng để đăng xuất
     */

    Route::post('logout', 'Auth\Admin\LoginController@logout')->name('admin.auth.logout');
});

