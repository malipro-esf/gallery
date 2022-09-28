<?php

use App\Http\Controllers\Admin\ArtworkController;
use App\Http\Controllers\Admin\AttributeController;
use App\Http\Controllers\Admin\AttributeValueController;
use App\Http\Controllers\Admin\BillController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\CommentController;
use App\Http\Controllers\Admin\IndexController;
use App\Http\Controllers\Admin\LocaleController;
use App\Http\Controllers\Admin\SendNewArtworkEmailController;
use App\Http\Controllers\Admin\TagController;
use App\Http\Controllers\Admin\UserController;
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



Route::get('/test', function (){
    return view('admin.test');
});
Route::get('/', function (){
    return redirect()->to('login');
//    return view('welcome');
});

Route::group(['prefix' => 'admin', 'middleware' => 'auth', ], function () {

    Route::resource('attribute', AttributeController::class);
    Route::resource('category', CategoryController::class);
    Route::resource('artwork', ArtworkController::class);
    Route::resource('tag', TagController::class);
    Route::resource('comment', CommentController::class);
    Route::resource('attribute-value', AttributeValueController::class);
    Route::resource('user',UserController::class);
    Route::resource('bill',BillController::class);

    Route::get('dashboard', [IndexController::class, 'index'])->name('dashboard');
    Route::get('set-locale/{locale}', [LocaleController::class, 'setLocale'])->name('set.locale');

    Route::get('send-new-artwork-email',[SendNewArtworkEmailController::class,'send'])->name('send.new.art.email');

});

Auth::routes();



Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
