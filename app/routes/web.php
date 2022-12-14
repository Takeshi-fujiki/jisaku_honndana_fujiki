<?php
use App\Http\Controllers\DisplayController;
use App\Http\Controllers\DeleteController;
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Auth;
use App\Comment;
use App\Type;
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


// Route::get('/home', 'HomeController@index')->name('home');

// 全ユーザ
Route::group(['middleware'=>'auth','can:user-higher'],function() {

    Route::resource('display','DisplayController');
    Route::resource('user','UserController');
    Route::resource('search','SearchController');
    
    Route::get('comment_del/{id}',[DeleteController::class,'delete'])->name('comment.del');
    Route::get('user_comment',[DisplayController::class,'comment'])->name('user_comment');
    Route::get('books_detail/{id}',[DisplayController::class,'books_detail'])->name('books_detail');
    Route::get('create_comment/{id}',[DisplayController::class,'create_comment'])->name('create_comment');
    Route::post('comment_show/{id}',[DisplayController::class,'comment_show'])->name('comment_show');

    Route::get('comment_del/{id}',[DeleteController::class,'delete'])->name('comment.del');
    Route::get('showData/{id}',[DeleteController::class,'showData'])->name('showData');
    

});

// 管理者以上
Route::group(['middleware'=>'auth','can:admin-higher'],function() {

Route::resource('/','UserController');
Route::resource('admin','AdminController');
    // 管理者ページ
    Route::get('admin_books', function () {
        return view('admin_books');
    });
    Route::get('admin_add_books', function () {
        $types = new Type;
        $type = $types->all()->toArray();
        return view('admin_add_books',[
            'types' => $type,
        ]);
    });
    Route::get('admin_users', function () {
        return view('admin_users');
    });
    Route::get('admin_blackList', function () {
        return view('admin_blackList');
    });
    Route::get('admin_exceed',[AdminController::class,'exceed'])->name('admin_exceed');
    Route::get('admin_UpClose',[AdminController::class,'UpClose'])->name('admin_upclose');

});

// 開発者のみ
Route::group(['middleware'=>'auth','can:system-only'],function() {

    Route::resource('system','SystemController');
    // 開発者、管理者新規登録
    Route::get('admin_register', function () {
        return view('admin_register');
    });

    Route::get('system_register', function () {
        return view('system_register');
    });

});