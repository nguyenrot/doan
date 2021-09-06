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
    Route::get('/dashboard',[
       'as'=>'admin.dashboard.index',
       'uses'=>'App\Http\Controllers\AdminDashboardController@index',
    ]);
    Route::prefix('categories')->group(function (){
        Route::get('/',[
            'as' =>'categories.index',
            'uses' => 'App\Http\Controllers\AdminCategoryController@index',
        ]);
    });
});
