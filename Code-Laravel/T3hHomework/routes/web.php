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
//    return view('frontend.shop.category.index');
    return view('frontend.homepages.index');
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

    Route::get('login', 'AdminController@login')->name('admin.auth.login');
//    Route::get('login', function(){
//        echo "hihi";
//    })->name('admin.auth.login');


    /**
     * url.com/admin/login
     * route xử lý quá trình đăng nhập admin
     */

    Route::post('login', 'AdminController@loginAdmin')->name('admin.auth.loginAdmin');

    /**
     * method POST
     * Route dùng để đăng xuất
     */

    Route::post('logout', 'AdminController@logout')->name('admin.auth.logout');
    /**
     * Quản trị website
     * thiết kế các chức năng
     */
    // route for shop
    /**
     * Route quản lý danh mục
     * shop/category
     */
    Route::get('shop/category', 'Admin\ShopCategoryController@index')->name('category.index');
    Route::get('shop/category/create', 'Admin\ShopCategoryController@create')->name('add-category');
    Route::get('shop/category/{id}/edit', 'Admin\ShopCategoryController@edit')->name('edit-category');
    Route::get('shop/category/{id}/delete', 'Admin\ShopCategoryController@delete')->name('delete-category');

    Route::post('shop/category', 'Admin\ShopCategoryController@store')->name('add-category-post');
    Route::post('shop/category/{id}/update', 'Admin\ShopCategoryController@update')->name('update-category-post');
    Route::post('shop/category/{id}/destroy', 'Admin\ShopCategoryController@destroy')->name('destroy-category-post');


    /**
     * Route quản lý sản phẩm
     * shop/product
     */
    Route::get('shop/product', 'Admin\ShopProductController@index')->name('product-index');
    Route::get('shop/product/create', 'Admin\ShopProductController@create')->name('add-product');
    Route::get('shop/product/{id}/edit', 'Admin\ShopProductController@edit')->name('edit-product');
    Route::get('shop/product/{id}/delete', 'Admin\ShopProductController@delete')->name('delete-product');

    Route::post('shop/product', 'Admin\ShopProductController@store')->name('add-product-post');
    Route::post('shop/product/{id}/update', 'Admin\ShopProductController@update')->name('update-product-post');
    Route::post('shop/product/{id}/destroy', 'Admin\ShopProductController@destroy')->name('destroy-product-post');

    /**
     * Route quản lý đặt hàng
     * shop/oder
     */

    Route::get('shop/oder', function(){
        return view('admin.content.shop.oder.index');
    });

    /**
     * Route quản lý brands
     * shop/brands
     */

    Route::get('shop/brand', 'Admin\ShopBrandController@index')->name('brand-index');
    Route::get('shop/brand/create', 'Admin\ShopBrandController@create')->name('add-brand');
    Route::get('shop/brand/{id}/edit', 'Admin\ShopBrandController@edit')->name('edit-brand');
    Route::get('shop/brand/{id}/delete', 'Admin\ShopBrandController@delete')->name('delete-brand');

    Route::post('shop/brand', 'Admin\ShopBrandController@store')->name('add-brand-post');
    Route::post('shop/brand/{id}/update', 'Admin\ShopBrandController@update')->name('update-brand-post');
    Route::post('shop/brand/{id}/destroy', 'Admin\ShopBrandController@destroy')->name('destroy-brand-post');


    /**
     * Route quản lý phản hồi
     * shop/review
     */
    Route::get('shop/review', function(){
        return view('admin.content.shop.review.index');
    });

    /**
     * Route quản lý thông tin khách hàng
     * shop/customer
     */
    Route::get('shop/customer', 'Admin\AdminManagerController@index')->name('customer-index');
    Route::get('shop/customer/create', 'Admin\AdminManagerController@create')->name('add-customer');
    Route::get('shop/customer/{id}/edit', 'Admin\AdminManagerController@edit')->name('edit-customer');
    Route::get('shop/customer/{id}/delete', 'Admin\AdminManagerController@delete')->name('delete-customer');

    Route::post('shop/customer', 'Admin\AdminManagerController@store')->name('add-customer-post');
    Route::post('shop/customer/{id}/update', 'Admin\AdminManagerController@update')->name('update-customer-post');
    Route::post('shop/customer/{id}/destroy', 'Admin\AdminManagerController@destroy')->name('delete-customer-post');

    /**
     * Route quản lý thông tin nhà vận chuyển
     * shop/shipper
     */
    Route::get('shop/shipper', 'Admin\ShipperManagerController@index')->name('shipper-index');
    Route::get('shop/shipper/create', 'Admin\ShipperManagerController@create')->name('add-shipper');
    Route::get('shop/shipper/{id}/edit', 'Admin\ShipperManagerController@edit')->name('edit-shipper');
    Route::get('shop/shipper/{id}/delete', 'Admin\ShipperManagerController@delete')->name('delete-shipper');

    Route::post('shop/shipper', 'Admin\ShipperManagerController@store')->name('add-shipper-post');
    Route::post('shop/shipper/{id}/update', 'Admin\ShipperManagerController@update')->name('update-shipper-post');
    Route::post('shop/shipper/{id}/destroy', 'Admin\ShipperManagerController@destroy')->name('delete-shipper-post');


    /**
     * Route quản lý thông tin nhà cung cấp
     * shop/seller
     */
    Route::get('shop/seller', 'Admin\SellerManagerController@index')->name('seller-index');
    Route::get('shop/seller/create', 'Admin\SellerManagerController@create')->name('add-seller');
    Route::get('shop/seller/{id}/edit', 'Admin\SellerManagerController@edit')->name('edit-seller');
    Route::get('shop/seller/{id}/delete', 'Admin\SellerManagerController@delete')->name('delete-seller');

    Route::post('shop/seller', 'Admin\SellerManagerController@store')->name('add-seller-post');
    Route::post('shop/seller/{id}/update', 'Admin\SellerManagerController@update')->name('update-seller-post');
    Route::post('shop/seller/{id}/destroy', 'Admin\SellerManagerController@destroy')->name('delete-seller-post');

    /**
     * Route quản lý statisstic
     * shop/statisstic
     */
    Route::get('shop/statistic', function(){
        return view('admin.content.shop.statistic.index');
    });
    //route for oder
    Route::get('oder', function(){
        return view('admin.content.oder.index');
    });

    // Route for content
    /**
     * Content category
     */
    Route::get('content/category', 'Admin\ContentCategoryController@index')->name('content-category-index');
    Route::get('content/category/create', 'Admin\ContentCategoryController@create')->name('add-content-category');
    Route::get('content/category/{id}/edit', 'Admin\ContentCategoryController@edit')->name('edit-content-category');
    Route::get('content/category/{id}/delete', 'Admin\ContentCategoryController@delete')->name('delete-content-category');

    Route::post('content/category', 'Admin\ContentCategoryController@store')->name('add-content-category-post');
    Route::post('content/category/{id}/update', 'Admin\ContentCategoryController@update')->name('update-content-category-post');
    Route::post('content/category/{id}/destroy', 'Admin\ContentCategoryController@destroy')->name('delete-content-category-post');

    /**
     * Route for content page
     */
    Route::get('content/page', 'Admin\ContentPageController@index')->name('content-page-index');
    Route::get('content/page/create', 'Admin\ContentPageController@create')->name('add-content-page');
    Route::get('content/page/{id}/edit', 'Admin\ContentPageController@edit')->name('edit-content-page');
    Route::get('content/page/{id}/delete', 'Admin\ContentPageController@delete')->name('delete-content-page');

    Route::post('content/page', 'Admin\ContentPageController@store')->name('add-content-page-post');
    Route::post('content/page/{id}/update', 'Admin\ContentPageController@update')->name('update-content-page-post');
    Route::post('content/page/{id}/destroy', 'Admin\ContentPageController@destroy')->name('delete-content-page-post');
    /**
     * Route for content posts
     */
    Route::get('content/post', 'Admin\ContentPostController@index')->name('content-post-index');
    Route::get('content/post/create', 'Admin\ContentPostController@create')->name('add-content-post');
    Route::get('content/post/{id}/edit', 'Admin\ContentPostController@edit')->name('edit-content-post');
    Route::get('content/post/{id}/delete', 'Admin\ContentPostController@delete')->name('delete-content-post');

    Route::post('content/post', 'Admin\ContentPostController@store')->name('add-content-post-post');
    Route::post('content/post/{id}/update', 'Admin\ContentPostController@update')->name('update-content-post-post');
    Route::post('content/post/{id}/destroy', 'Admin\ContentPostController@destroy')->name('delete-content-post-post');
    /**
     * Route for content tags
     */
    Route::get('content/tag', 'Admin\ContentTagController@index')->name('content-tag-index');
    Route::get('content/tag/create', 'Admin\ContentTagController@create')->name('add-content-tag');
    Route::get('content/tag/{id}/edit', 'Admin\ContentTagController@edit')->name('edit-content-tag');
    Route::get('content/tag/{id}/delete', 'Admin\ContentTagController@delete')->name('delete-content-tag');

    Route::post('content/tag', 'Admin\ContentTagController@store')->name('add-content-tag-post');
    Route::post('content/tag/{id}/update', 'Admin\ContentTagController@update')->name('update-content-tag-post');
    Route::post('content/tag/{id}/destroy', 'Admin\ContentTagController@destroy')->name('delete-content-tag-post');


    /**
     * Route for menu
     */

    Route::get('menu', 'Admin\MenuController@index')->name('menu-index');
    Route::get('menu/create', 'Admin\MenuController@create')->name('add-menu');
    Route::get('menu/{id}/edit', 'Admin\MenuController@edit')->name('edit-menu');
    Route::get('menu/{id}/delete', 'Admin\MenuController@delete')->name('delete-menu');

    Route::post('menu', 'Admin\MenuController@store')->name('add-menu-post');
    Route::post('menu/{id}/update', 'Admin\MenuController@update')->name('update-menu-post');
    Route::post('menu/{id}/destroy', 'Admin\MenuController@destroy')->name('delete-menu-post');

    /**
     * Route for menu-item
     */

    Route::get('menu-item', 'Admin\MenuItemController@index')->name('menu-item-index');
    Route::get('menu-item/create', 'Admin\MenuItemController@create')->name('add-menu-item');
    Route::get('menu-item/{id}/edit', 'Admin\MenuItemController@edit')->name('edit-menu-item');
    Route::get('menu-item/{id}/delete', 'Admin\MenuItemController@delete')->name('delete-menu-item');

    Route::post('menu-item', 'Admin\MenuItemController@store')->name('add-menu-item-post');
    Route::post('menu-item/{id}/update', 'Admin\MenuItemController@update')->name('update-menu-item-post');
    Route::post('menu-item/{id}/destroy', 'Admin\MenuItemController@destroy')->name('delete-menu-item-post');


    // route for admin-user

    Route::get('users-admin', 'Admin\AdminManagerController@index')->name('users-admin-index');
    Route::get('users-admin/create', 'Admin\AdminManagerController@create')->name('add-users-admin');
    Route::get('users-admin/{id}/edit', 'Admin\AdminManagerController@edit')->name('edit-users-admin');
    Route::get('users-admin/{id}/delete', 'Admin\AdminManagerController@delete')->name('delete-users-admin');

    Route::post('users-admin', 'Admin\AdminManagerController@store')->name('add-users-admin-post');
    Route::post('users-admin/{id}/update', 'Admin\AdminManagerController@update')->name('update-users-admin-post');
    Route::post('users-admin/{id}/destroy', 'Admin\AdminManagerController@destroy')->name('delete-users-admin-post');



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



