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

Route::group(['middleware' => 'adminCheck'],function (){
    Route::get('/', function () {return view('admin.index.index');});
    Route::get('/home', 'Admin\IndexController@home');
    Route::get('/logout', 'Admin\LoginController@logout');

    //图片上传
    Route::post('/uploadImage', 'Admin\Common\UploadController@uploadImage');
});


Route::get('/login', function (){return view('admin.index.login');});
Route::post('/sub_login', 'Admin\LoginController@sub_login');

