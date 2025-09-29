<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\CartController;
use App\Http\Controllers\FileImportController;

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

Route::get('/', '\App\Http\Controllers\HomeController@index')->name('home');

Route::get('/login', 'App\Http\Controllers\LoginController@index')->name('feuser.login');
Route::post('/login', 'App\Http\Controllers\LoginController@postLogin')->name('postLogin');


Route::get('/register', 'App\Http\Controllers\LoginController@register')->name('feuser.register');
Route::post('/register', 'App\Http\Controllers\LoginController@postRegister')->name('postRegister');

Route::get('/logout', function(){
    Auth::logout();
    return redirect()->route('home');
})->name('logout');

Route::get('/category/{slug}/{id}',[
    'as'=> 'category.product',
    'uses'=> '\App\Http\Controllers\CategoryController@index'
]);


Route::get('/TTusers', 'App\Http\Controllers\LoginController@TTusers')->name('feuser.ttusers');

Route::get('/addTTusers', 'App\Http\Controllers\LoginController@Add')->name('feuser.add');
Route::post('/TTusers', 'App\Http\Controllers\LoginController@postTTusers')->name('postTTusers');


Route::post('/update-order-status/{id}', 'App\Http\Controllers\CartController@updateOrderStatus');
Route::post('/order','App\Http\Controllers\CartController@postTTusers')->name('order.store');
Route::get('/cart', 'App\Http\Controllers\CartController@index')->name('shopingcart.cart');
Route::get('/punchorder', 'App\Http\Controllers\CartController@Punchorder')->name('shopingcart.punchorder');

Route::get('/Add-cart/{id}', 'App\Http\Controllers\CartController@Addcart');
Route::get('/Delete-list-cart/{id}', 'App\Http\Controllers\CartController@DeleteListCart');

Route::get('/Save-list-cart/{id}/{quanty}', 'App\Http\Controllers\CartController@SaveListCart');

Route::get('/order', [CartController::class, 'order'])->name('shopingcart.order');
Route::post('/submit-order', [CartController::class, 'submitOrder'])->name('shopingcart.submitOrder');

Route::get('/detail/{id}', 'App\Http\Controllers\CategoryController@Detail')->name('product.category.productdetail');

Route::post('/check-email', 'App\Http\Controllers\LoginController@checkEmail')->name('check-email');

// File Import/Export Routes
Route::post('/import-users', [FileImportController::class, 'importUsers'])->name('import.users');
Route::get('/export-user-data', [FileImportController::class, 'exportUserData'])->name('export.user.data')->middleware('auth');
Route::get('/download-sample-file', [FileImportController::class, 'downloadSampleFile'])->name('download.sample.file');
