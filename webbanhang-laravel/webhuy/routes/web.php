<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
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
Route::get('/admin', 'App\Http\Controllers\AdminController@loginAdmin');
Route::post('/admin', 'App\Http\Controllers\AdminController@postloginAdmin');
Route::post('/logout', 'App\Http\Controllers\AdminController@logoutAdmin')->name('logout');



Route::get('/home', function () {
    return view('home');
});

Route::prefix('admin')->group(function () {

    Route::prefix('categories')->group(function () {
        Route::get('/',[
            'as'=>'categories.index',
            'uses'=>'App\Http\Controllers\CategoryController@index'
    
        ]);
        
        Route::get('/create',[
            'as'=>'categories.create',
            'uses'=>'App\Http\Controllers\CategoryController@create'
    
        ]);
    
        Route::post('/store',[
            'as'=>'categories.store',
            'uses'=>'App\Http\Controllers\CategoryController@store'
    
        ]);
    
        Route::get('/edit/{id}', [
            'as' => 'categories.edit',
            'uses' => 'App\Http\Controllers\CategoryController@edit'
        ]);
        
    
    
        Route::post('/update/{id}',[
            'as'=>'categories.update',
            'uses'=>'App\Http\Controllers\CategoryController@update'
    
        ]);
    
        Route::get('/delete/{id}',[
            'as'=>'categories.delete',
            'uses'=>'App\Http\Controllers\CategoryController@delete'
    
        ]);
    
    
    
        
    });

    Route::prefix('menus')->group(function () {
        Route::get('/',[
            'as'=>'menus.index',
            'uses'=>'App\Http\Controllers\MenuController@index'
    
        ]);
    
        Route::get('/create',[
            'as'=>'menus.create',
            'uses'=>'App\Http\Controllers\MenuController@create'
    
        ]);
    
        Route::post('/store',[
            'as'=>'menus.store',
            'uses'=>'App\Http\Controllers\MenuController@store'
    
        ]);
    
        
        Route::get('/edit/{id}', [
            'as' => 'menus.edit',
            'uses' => 'App\Http\Controllers\MenuController@edit'
        ]);
        
    
    
        Route::post('/update/{id}',[
            'as'=>'menus.update',
            'uses'=>'App\Http\Controllers\MenuController@update'
    
        ]);
    
        
        Route::get('/delete/{id}',[
            'as'=>'menus.delete',
            'uses'=>'App\Http\Controllers\MenuController@delete'
    
        ]);
    
    
    }); 
    
    //product
    Route::prefix('product')->group(function () {
        Route::get('/',[
            'as'=>'product.index',
            'uses'=>'App\Http\Controllers\AdminProductController@index'
    
        ]);
        Route::get('/create',[
            'as'=>'product.create',
            'uses'=>'App\Http\Controllers\AdminProductController@create'
    
        ]);

        Route::post('/store',[
            'as'=>'product.store',
            'uses'=>'App\Http\Controllers\AdminProductController@store'
    
        ]);

        Route::get('/edit/{id}',[
            'as'=>'product.edit',
            'uses'=>'App\Http\Controllers\AdminProductController@edit'
    
        ]);

        Route::post('/update/{id}',[
            'as'=>'product.update',
            'uses'=>'App\Http\Controllers\AdminProductController@update'
    
        ]);

        Route::get('/delete/{id}',[
            'as'=>'product.delete',
            'uses'=>'App\Http\Controllers\AdminProductController@delete'
    
        ]);
        Route::get('/thongke',[
            'as'=>'product.thongke',
            'uses'=>'App\Http\Controllers\AdminProductController@thongke'
    
        ]);
    });
    
    Route::prefix('slider')->group(function () {
        Route::get('/',[
            'as'=>'slider.index',
            'uses'=>'App\Http\Controllers\SliderAdminController@index'
    
        ]); 
        
        Route::get('/create',[
            'as'=>'slider.create',
            'uses'=>'App\Http\Controllers\SliderAdminController@create'
    
        ]); 

        Route::post('/store',[
            'as'=>'slider.store',
            'uses'=>'App\Http\Controllers\SliderAdminController@store'
    
        ]); 

        Route::get('/edit/{id}',[
            'as'=>'slider.edit',
            'uses'=>'App\Http\Controllers\SliderAdminController@edit'
    
        ]); 

        Route::post('/update/{id}',[
            'as'=>'slider.update',
            'uses'=>'App\Http\Controllers\SliderAdminController@update'
    
        ]); 

        
        Route::get('/delete/{id}',[
            'as'=>'slider.delete',
            'uses'=>'App\Http\Controllers\SliderAdminController@delete'
    
        ]); 
    
    }); 

    Route::prefix('user')->group(function () {
        Route::get('/',[
            'as'=>'user.index',
            'uses'=>'App\Http\Controllers\UserAdminController@index'
    
        ]);
        Route::get('/delete/{id}',[
            'as'=>'user.delete',
            'uses'=>'App\Http\Controllers\UserAdminController@delete'
    
        ]);

    
    }); 

    Route::prefix('order')->group(function () {
        Route::get('/order',[
            'as'=>'order.order',
            'uses'=>'App\Http\Controllers\OrderController@Order'
        ]);

        Route::get('/delete/{id}',[
            'as'=>'order.delete',
            'uses'=>'App\Http\Controllers\OrderController@delete'
        ]);

        Route::get('/status/{id}', [
            'as' => 'order.status',
            'uses' => 'App\Http\Controllers\OrderController@Status'
        ]);
        
        Route::post('/update-status/{id}', [
            'as' => 'order.updatestatus',
            'uses' => 'App\Http\Controllers\OrderController@updateStatus'
        ]);

        Route::get('/thongkedonhang',[
            'as'=>'order.thongkedonhang',
            'uses'=>'App\Http\Controllers\OrderController@thongkedonhang'
        ]);
        

    
    }); 

});

  