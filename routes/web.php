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

Route::get('/', function () {
    return view('welcome');
});

Route::group(['prefix' => 'admin', 'namespace' => 'Admin'], function(){
    Route::match(['get', 'post'], '/', 'AuthController@login')->name('admin.login');

    Route::group([], function (){
        Route::get('dashboard', 'AuthController@dashboard')->name('admin.dashboard');
        Route::get('logout', 'AuthController@logout')->name('admin.logout');
    });

});