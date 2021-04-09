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
Route::group(['middleware'=>'auth:admin'],function(){
 
    Route::get('/','App\Http\Controllers\Admin\DashboardController@index');
});

Route::group(['middleware'=>'guest:admin'],function(){
    
    Route::get('login','App\Http\Controllers\Admin\LoginController@getlogin');
    Route::post('login','App\Http\Controllers\Admin\LoginController@login')->name('admin.login');

});
