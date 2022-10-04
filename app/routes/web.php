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

use App\Http\Controllers\ArticleController;
use Illminate\Support\Facades\Auth;

// Route::get('/', function () {
//     return view('book_datail');
// });



// Route::get('/',[DisplayController::class,'index']);

Route::resource('article','ArticleController');

