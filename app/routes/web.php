<?php

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

//一般
Route::namespace('User')->prefix('user')->name('user.')->group(function () {

    Auth::routes();

    Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
    Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
    Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
    Route::post('password/reset', 'Auth\ResetPasswordController@reset')->name('password.update');
    Route::post('user/create', 'Auth\RegisterController@create')->name('create');
    
    Route::middleware('auth:user')->group(function () {
        Route::resource('/index','UserController');
        
        Route::post('/api','ApiTestController@test')->name('google_api');
        
        Route::post('/event', 'EventController@store')->name('store.day');
        Route::get('/calendar', 'EventController@index')->name('calendar');
        Route::get('/notajax_calendar', 'EventController@notAjax')->name('notAjax_calendar');
        Route::post('/notajax_calendar', 'EventController@notAjaxPost')->name('notAjax_calendar');
        
        
        Route::post('/like', 'DisplayController@ajaxlike')->name('reviews.like');
        Route::get('/likis_list','DisplayController@likes_list')->name('likesList');
        
        Route::resource('display','DisplayController');
        Route::resource('user','UserController');
        Route::resource('search','SearchController');
        
        Route::get('comment_del/{id}','DeleteController@delete')->name('comment.del');
        Route::get('user_comment','DisplayController@comment')->name('user_comment');
        Route::get('books_detail/{id}','DisplayController@books_detail')->name('books_detail');
        Route::get('create_comment/{id}','DisplayController@create_comment')->name('create_comment');
        Route::post('comment_show/{id}','DisplayController@comment_show')->name('comment_show');
        
        Route::get('comment_del/{id}','DeleteController@delete')->name('comment.del');
        Route::get('showData/{id}','DeleteController@showData')->name('showData');
    });
});

// 管理者
Route::namespace('Admin')->prefix('admin')->name('admin.')->group(function (){

    Auth::routes();

    Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
    Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
    Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
    Route::post('password/reset', 'Auth\ResetPasswordController@reset')->name('password.update');
    Route::post('user/create', 'Auth\RegisterController@create')->name('create');

    Route::middleware('auth:admin')->group(function () {
        Route::resource('admin','AdminController');
        Route::get('home','AdminController@home');
        
        Route::get('admin_books', function () {
            return view('admin.admin_books');
        });
        Route::get('admin_add_books', function () {
            $types = new Type;
            $type = $types->all()->toArray();
            return view('add_books',[
                'types' => $type,
            ]);
        });
        Route::get('admin_users', function () {
            return view('admin.allUsers');
        });
        Route::get('admin_blackList', function () {
            return view('admin.blackList');
        });
        Route::get('admin_exceed','AdminController@exceed')->name('admin_exceed');
        Route::get('admin_UpClose','AdminController@UpClose')->name('admin_upclose');

        Route::resource('system','SystemController');
        
    });
});

Route::get('/', function () {
    return view('user.auth.login');
})->where('any', '.*');
// Route::get('vue',function(){
//     return view('vue');
// });

