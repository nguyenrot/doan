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
        'uses'=>'App\Http\Controllers\AdminLoginController@login'
    ]);
    Route::post('/login',[
        'as'=>'admin.loginPost',
        'uses'=>'App\Http\Controllers\AdminLoginController@loginPost'
    ]);
});

Route::prefix('/')->group(function (){
    Route::get('/login',[
        'as'=>'user.login',
        'uses'=>'App\Http\Controllers\UserLoginController@login'
    ]);
    Route::post('/login',[
        'as'=>'user.loginPost',
        'uses'=>'App\Http\Controllers\UserLoginController@loginPost'
    ]);
});
