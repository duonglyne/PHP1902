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
    return view('frontend.shop.category.index');
//    return view('frontend.homepages.index');
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
    /**
     * Quản trị website
     * thiết kế các chức năng
     */
    // route for shop
    Route::get('shop/category', function(){
       return view('admin.content.shop.category.index');
    });

    Route::get('shop/product', function(){
        return view('admin.content.shop.product.index');
    });

    Route::get('shop/oder', function(){
        return view('admin.content.shop.oder.index');
    });

    Route::get('shop/brands', function(){
        return view('admin.content.shop.brands.index');
    });

    Route::get('shop/review', function(){
        return view('admin.content.shop.review.index');
    });

    Route::get('shop/customer', function(){
        return view('admin.content.shop.customer.index');
    });

    Route::get('shop/statistic', function(){
        return view('admin.content.shop.statistic.index');
    });
    //route for oder
    Route::get('oder', function(){
        return view('admin.content.oder.index');
    });

    // Route for content
    Route::get('content/category', function(){
        return view('admin.content.content.category.index');
    });

    Route::get('content/page', function(){
        return view('admin.content.content.page.index');
    });

    Route::get('content/post', function(){
        return view('admin.content.content.post.index');
    });

    Route::get('content/tag', function(){
        return view('admin.content.content.tag.index');
    });
    // roure for menu
    Route::get('menu', function(){
        return view('admin.content.menu.menu.index');
    });

    Route::get('menu-item', function(){
        return view('admin.content.menu.menu-item.index');
    });
    // route for admin-user
    Route::get('users', function(){
        return view('admin.content.admin.index');
    });

    // route for banners
    Route::get('banners', function(){
        return view('admin.content.banner.index');
    });

    //route for contact
    Route::get('contacts', function(){
        return view('admin.content.contact.index');
    });

    // route for global setting
    Route::get('config', function(){
        return view('admin.content.global-setting.index');
    });

    // route for media
    Route::get('media', function(){
        return view('admin.content.media.index');
    });

    // route for newletters
    Route::get('newletters', function(){
        return view('admin.content.newletter.index');
    });

    //route for email
    Route::get('email/inbox', function(){
        return view('admin.content.email.inbox.index');
    });

    Route::get('email/draft', function(){
        return view('admin.content.email.draft.index');
    });

    Route::get('email/send', function(){
        return view('admin.content.email.send.index');
    });
});

/**
 * Route for seller
 */
Route::prefix('seller')->group(function(){
    // gom nhóm các route cho phần seller

    // url.com/seller/
    Route::get('/', 'Auth\Seller\SellerController@index')->name('seller.dashboard');

    /**
     * url.com/seller/dashboard/
     * Sau khi đăng nhập thành công
     */
    Route::get('dashboard', 'Auth\Seller\SellerController@index')->name('seller.dashboard');

    /**
     * url.com/seller/register
     * route trả về view đăng ký tài khoản seller
     */

    Route::get('register', 'Auth\Seller\SellerController@create')->name('seller.register');

    /**
     *url.com/seller/register
     * đây là phương thức post
     * Route để đăng ký tài khoản seller từ form POST
     */
    Route::post('register', 'Auth\Seller\SellerController@store')->name('seller.register.store');

    /**
     * url.com/seller/login
     * route trả về view đăng nhập seller
     */

    Route::get('login', 'Auth\Seller\LoginController@login')->name('seller.auth.login');


    /**
     * url.com/seller/login
     * route xử lý quá trình đăng nhập admin
     */

    Route::post('login', 'Auth\Seller\LoginController@loginSeller')->name('seller.auth.loginSeller');

    /**
     * method POST
     * Route dùng để đăng xuất
     */

    Route::post('logout', 'Auth\Seller\LoginController@logout')->name('seller.auth.logout');
});

/**
 * Route for shippers
 */

Route::prefix('shipper')->group(function(){
    // gom nhóm các route cho phần shipper

    // url.com/seller/
    Route::get('/', 'Auth\Shipper\ShipperController@index')->name('shipper.dashboard');

    /**
     * url.com/shipper/dashboard/
     * Sau khi đăng nhập thành công
     */
    Route::get('dashboard', 'Auth\Shipper\ShipperController@index')->name('shipper.dashboard');

    /**
     * url.com/seller/register
     * route trả về view đăng ký tài khoản seller
     */

    Route::get('register', 'Auth\Shipper\ShipperController@create')->name('shipper.register');

    /**
     *url.com/shipper/register
     * đây là phương thức post
     * Route để đăng ký tài khoản shipper từ form POST
     */
    Route::post('register', 'Auth\Shipper\ShipperController@store')->name('shipper.register.store');

    /**
     * url.com/shipper/login
     * route trả về view đăng nhập seller
     */

    Route::get('login', 'Auth\Shipper\LoginController@login')->name('shipper.auth.login');


    /**
     * url.com/shipper/login
     * route xử lý quá trình đăng nhập admin
     */

    Route::post('login', 'Auth\Shipper\LoginController@loginShipper')->name('shipper.auth.loginShipper');

    /**
     * method POST
     * Route dùng để đăng xuất
     */

    Route::post('logout', 'Auth\Shipper\LoginController@logout')->name('shipper.auth.logout');
});



