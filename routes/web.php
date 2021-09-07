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

Route::prefix('admin')->group(function (){
    Route::get('/login',[
        'as'=>'admin.login',
        'uses'=>'App\Http\Controllers\AdminLoginController@login',
    ]);
    Route::post('/login',[
        'as'=>'admin.loginPost',
        'uses'=>'App\Http\Controllers\AdminLoginController@loginPost',
    ]);
    Route::get('/logout',[
        'as'=>'admin.logout',
        'uses'=>'App\Http\Controllers\AdminLoginController@logout',
    ]);
});

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
});
