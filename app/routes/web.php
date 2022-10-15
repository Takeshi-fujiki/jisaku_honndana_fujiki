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


// 開発者、管理者新規登録
Route::get('admin_register', function () {
    return view('admin_register');
});

Route::get('system_register', function () {
    return view('system_register');
});

// 管理者ページ
Route::get('admin_books', function () {
    return view('admin_books');
});
Route::get('admin_add_books', function () {
    return view('admin_add_books');
});
Route::get('admin_users', function () {
    return view('admin_users');
});
Route::get('admin_blackList', function () {
    return view('admin_blackList');
});
Route::get('admin_UpClose', function () {
    return view('admin_UpClose');
});
Route::get('admin_exceed', function () {
    return view('admin_exceed');
});

Route::get('/return', function () {
    return view('return');
});

// Route::get('/home', 'HomeController@index')->name('home');

// 全ユーザ
Route::group(['middleware'=>'auth','can:user-higher'],function() {

    Route::resource('display','DisplayController');
    Route::resource('user','UserController');
    Route::resource('search','SearchController');

    // Route::patch('update/{search}','SearchController@update');

});

// 管理者以上
Route::group(['middleware'=>'auth','can:admin-higher'],function() {

    Route::resource('admin','AdminController');

});

// 開発者のみ
Route::group(['middleware'=>'auth','can:system-only'],function() {

    Route::resource('system','SystemController');

});