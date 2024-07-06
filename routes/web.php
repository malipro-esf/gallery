<?php

use App\Http\Controllers\Admin\ArtworkController;
use App\Http\Controllers\Admin\AttributeController;
use App\Http\Controllers\Admin\AttributeValueController;
use App\Http\Controllers\Admin\BillController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\CommentController;
use App\Http\Controllers\Admin\ContactController;
use App\Http\Controllers\Admin\IndexController;
use App\Http\Controllers\Admin\ProposedPriceController;
use App\Http\Controllers\Admin\SettingsController;
use App\Http\Controllers\Admin\SupportTicketController;
use App\Http\Controllers\Admin\TagController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\LocaleController;
use App\Http\Controllers\SingleController;
use App\Http\Controllers\User\HomeController;
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

Auth::routes(['register' => true]);

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('set-locale/{locale}', [LocaleController::class, 'setLocale'])->name('set.locale');


Route::get('/login', function (){
    return view('auth.login');
})->name('login');


//admin routes
Route::group(['prefix' => 'admin', 'middleware' => 'admin' ], function () {

    Route::resource('attribute', AttributeController::class);
    Route::resource('category', CategoryController::class);
    Route::resource('artwork', ArtworkController::class);
    Route::resource('tag', TagController::class);
    Route::resource('comment', CommentController::class);
    Route::resource('attribute-value', AttributeValueController::class);
    Route::resource('user',UserController::class);
    Route::resource('bill',BillController::class);
    Route::resource('proposed-price',ProposedPriceController::class);
    Route::resource('support-ticket',SupportTicketController::class);
    Route::resource('settings',SettingsController::class);

    Route::get('dashboard', [IndexController::class, 'index'])->name('dashboard');
    Route::get('set-locale/{locale}', [LocaleController::class, 'setLocale'])->name('admin.set.locale');
    Route::get('contact/index', [ContactController::class, 'index'])->name('contact.index');
    Route::post('contact/reply', [ContactController::class, 'reply'])->name('contact.reply');
    //Route::get('send-new-artwork-email',[SendNewArtworkEmailController::class,'send'])->name('send.new.art.email');

});


//for tdd
Route::get('single/{artwork}', [SingleController::class, 'index'])->name('single');
Route::post('single/{artwork}/comment', [SingleController::class, 'comment'])->name('single.comment');

// for test
Route::get('/test', function (){
//    return Hash::make(123456);
    return view('admin.test');
});

