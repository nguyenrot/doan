<?php

use Illuminate\Support\Facades\Route;

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
//FileManager
Route::group(['prefix' => 'filemanager', 'middleware' => ['web', 'auth:admin']], function () {
    \UniSharp\LaravelFilemanager\Lfm::routes();
});

//AdminLogin
Route::prefix('admin')->group(function (){
    Route::get('/login',[
        'as'=>'admin.login',
        'uses'=>'App\Http\Controllers\AdminLoginController@login',
    ])->middleware('Admin');
    Route::post('/login',[
        'as'=>'admin.loginPost',
        'uses'=>'App\Http\Controllers\AdminLoginController@loginPost',
    ]);
    Route::get('/logout',[
        'as'=>'admin.logout',
        'uses'=>'App\Http\Controllers\AdminLoginController@logout',
    ]);
});

//Admin
Route::prefix('admin')->middleware('CheckAdmin')->group(function (){
    Route::get('/',[
       'as'=>'admin.dashboard.index',
       'uses'=>'App\Http\Controllers\AdminDashboardController@index',
    ]);

    Route::prefix('categories')->group(function (){
        Route::get('/',[
            'as' =>'categories.index',
            'uses' => 'App\Http\Controllers\AdminCategoryController@index',
        ]);
        Route::get('/create',[
            'as'=>'categories.create',
            'uses' => 'App\Http\Controllers\AdminCategoryController@create',
        ]);
        Route::post('/store',[
            'as'=>'categories.store',
            'uses' => 'App\Http\Controllers\AdminCategoryController@store',
        ]);
        Route::get('/edit/{id}',[
            'as'=>'categories.edit',
            'uses' => 'App\Http\Controllers\AdminCategoryController@edit',
        ]);
        Route::post('/update/{id}',[
            'as'=>'categories.update',
            'uses' => 'App\Http\Controllers\AdminCategoryController@update',
        ]);
        Route::get('/delete/{id}',[
            'as'=>'categories.delete',
            'uses' => 'App\Http\Controllers\AdminCategoryController@delete',
        ]);
    });

    Route::prefix('menu')->group(function (){
        Route::get('/',[
            'as'=>'menu.index',
            'uses' => 'App\Http\Controllers\AdminMenuController@index',
        ]);
        Route::get('/create',[
            'as'=>'menu.create',
            'uses'=>'App\Http\Controllers\AdminMenuController@create',
        ]);
        Route::post('/store',[
            'as'=>'menu.store',
            'uses'=>'App\Http\Controllers\AdminMenuController@store',
        ]);
        Route::get('/edit/{id}',[
            'as'=>'menu.edit',
            'uses' => 'App\Http\Controllers\AdminMenuController@edit',
        ]);
        Route::post('/update/{id}',[
            'as'=>'menu.update',
            'uses' => 'App\Http\Controllers\AdminMenuController@update',
        ]);
        Route::get('/delete/{id}',[
            'as'=>'menu.delete',
            'uses' => 'App\Http\Controllers\AdminMenuController@delete',
        ]);
    });

    Route::prefix('product')->group(function (){
        Route::get('/',[
            'as'=>'product.index',
            'uses'=> 'App\Http\Controllers\AdminSanphamController@index',
        ]);
        Route::get('/create',[
            'as'=>'product.create',
            'uses'=> 'App\Http\Controllers\AdminSanphamController@create',
        ]);
        Route::post('/store',[
            'as'=>'product.store',
            'uses'=>'App\Http\Controllers\AdminSanphamController@store',
        ]);
        Route::get('/edit/{id}',[
            'as'=>'product.edit',
            'uses' => 'App\Http\Controllers\AdminSanphamController@edit',
        ]);
        Route::post('/update/{id}',[
            'as'=>'product.update',
            'uses' => 'App\Http\Controllers\AdminSanphamController@update',
        ]);
        Route::get('/delete/{id}',[
            'as'=>'product.delete',
            'uses' => 'App\Http\Controllers\AdminSanphamController@delete',
        ]);
        Route::get('/active/{id}',[
            'as'=>'product.active',
            'uses' => 'App\Http\Controllers\AdminSanphamController@active',
        ]);
    });

    Route::prefix('khuyenmai')->group(function (){
        Route::get('/',[
            'as'=>'khuyenmai.index',
            'uses'=> 'App\Http\Controllers\AdminKhuyenMaiController@index',
        ]);
        Route::get('/create',[
            'as'=>'khuyenmai.create',
            'uses'=> 'App\Http\Controllers\AdminKhuyenMaiController@create',
        ]);
        Route::post('/store',[
            'as'=>'khuyenmai.store',
            'uses'=> 'App\Http\Controllers\AdminKhuyenMaiController@store',
        ]);
        Route::get('/edit/{id}',[
            'as'=>'khuyenmai.edit',
            'uses'=> 'App\Http\Controllers\AdminKhuyenMaiController@edit',
        ]);
        Route::post('/update/{id}',[
            'as'=>'khuyenmai.update',
            'uses'=> 'App\Http\Controllers\AdminKhuyenMaiController@update',
        ]);
        Route::get('/delete/{id}',[
            'as'=>'khuyenmai.delete',
            'uses'=> 'App\Http\Controllers\AdminKhuyenMaiController@delete',
        ]);
        Route::get('/add_product/{id}',[
            'as'=>'khuyenmai.add_product',
            'uses'=> 'App\Http\Controllers\AdminKhuyenMaiController@add_product',
        ]);
        Route::post('/post_add_product/{id}',[
            'as'=>'khuyenmai.post_add_product',
            'uses'=> 'App\Http\Controllers\AdminKhuyenMaiController@post_add_product',
        ]);
        Route::get('/active_product/{id}',[
            'as'=>'khuyenmai.active_product',
            'uses'=> 'App\Http\Controllers\AdminKhuyenMaiController@active_product',
        ]);
    });
});

//UserLogin
Route::prefix('/')->group(function (){
    Route::get('/login',[
        'as'=>'user.login',
        'uses'=>'App\Http\Controllers\UserLoginController@login',
    ]);
    Route::post('/login',[
        'as'=>'user.loginPost',
        'uses'=>'App\Http\Controllers\UserLoginController@loginPost',
    ]);
    Route::get('/register',[
        'as'=>'user.register',
        'uses'=>'App\Http\Controllers\UserLoginController@register',
    ]);
    Route::get('/logout',[
        'as'=>'user.logout',
        'uses'=>'App\Http\Controllers\UserLoginController@logout',
    ]);
});

//Web
Route::prefix('/')->group(function (){
    Route::get('/',[
       'as'=>'home',
       'uses'=>'App\Http\Controllers\HomeController@index'
    ]);

    Route::prefix('/sanpham')->group(function (){
        Route::get('/',[
           'as'=>'sanpham.index',
           'uses'=>'App\Http\Controllers\SanPhamController@index'
        ]);
        Route::get('/chitiet/{id}',[
           'as'=>'sanpham.chitiet',
           'uses'=>'App\Http\Controllers\SanPhamController@chitiet'
        ]);
    });
});
