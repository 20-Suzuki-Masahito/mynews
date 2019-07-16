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
    return view('welcome');
});

// PHP/Laravel09 課題4
Route::group(['prefix' => 'admin'], function(){
    Route::get('news/create', 'Admin\NewsController@add');
    Route::get('profile/create', 'Admin\ProfileController@add');
    Route::get('profile/edit', 'Admin\ProfileController@edit');
});

// PHP/Laravel09 課題3 *AAAControllerはAdminディレクトリ下に保存されているものとする
Route::get('XXX', 'Admin\AAAController@bbb');


