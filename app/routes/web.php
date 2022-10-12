<?php
use App\Http\Controllers\DisplayController;
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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::resource('/','DisplayController');

Route::get('admin_register', function () {
    return view('admin_register');
});

Route::get('system_register', function () {
    return view('system_register');
});

// Route::get('/home', 'HomeController@index')->name('home');

// 全ユーザ
Route::group(['middleware'=>'auth','can:user-higher'],function() {

    Route::resource('display','DisplayController');
    Route::resource('user','UserController');
    Route::resource('search','SearchController');

});

// 管理者以上
Route::group(['middleware'=>'auth','can:admin-higher'],function() {

    Route::resource('admin','AdminController');

});

// 開発者のみ
Route::group(['middleware'=>'auth','can:system-only'],function() {

    Route::resource('system','SystemController');

});