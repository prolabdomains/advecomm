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

    Route::group(['middleware' => ['checkAdmin']], function (){
        Route::get('dashboard', 'AdminController@dashboard')->name('admin.dashboard');
        Route::post('chkCurrentPassword', 'AdminController@chkCurrentPassword');
        Route::match(['get', 'post'], 'change/password', 'AdminController@changePassword')->name('admin.change.password');
        Route::match(['get', 'post'], 'change/details', 'AdminController@changeDetails')->name('admin.change.details');
        Route::get('logout', 'AuthController@logout')->name('admin.logout');

        // Sections Route
        Route::get('sections', 'SectionController@sections')->name('admin.sections');
        Route::post('update-section-status', 'SectionController@updateSectionStatus');
    });

});
