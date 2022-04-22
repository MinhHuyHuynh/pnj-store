<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ClassifyController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PnjController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;

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

Route::GET('/', 'PnjController@index')->name('pnj.index');

Route::get('/classify/{slug_classify}', 'PnjController@showClassify')->name('pnj.show.classify');
Route::get('/product/{id_product}', 'PnjController@showProduct')->name('pnj.show.product');
Route::get('/show-order','PnjController@showOrder')->name('pnj.show.order');
Route::post('/order','OrderController@store')->name('order.store');
Route::post('/add-cart','OrderController@addCart')->name('order.add.cart');
Route::get('/del-item','OrderController@delItem')->name('order.del.item');
Route::post('/update-item','OrderController@updateItem')->name('order.update.item');

//Route::get('/result-order','PnjController@resultOrder')->name('pnj.result.order');
Route::post('/store-comment','CommentController@store')->name('comment.store');
//
//
Route::group(['prefix' => 'admin','middleware'=>'access.auth'], function () {
        Route::get('/logout','AuthController@logout')->name('login.logout');

        Route::get('/classify', 'ClassifyController@index')->name('classify.index');
        Route::get('/add-classify', 'ClassifyController@create')->name('classify.create');
        Route::post('/classify','ClassifyController@store')->name('classify.store');
        Route::get('/show-classify/{id}','ClassifyController@show')->name('classify.show');
        Route::post('/edit-classify/{id}','ClassifyController@edit')->name('classify.edit');
        Route::get('/destroy-classify/{id}','ClassifyController@destroy')->name('classify.destroy');
//
        Route::get('/product', 'ProductController@index')->name('product.index');
        Route::get('/add-product','ProductController@create')->name('product.create');
        Route::post('/save-product','ProductController@store')->name('product.store');
        Route::get('/show-product/{id}','ProductController@show')->name('product.show');
        Route::post('/edit-product/{id}','ProductController@edit')->name('product.edit');
        Route::get('/destroy-product/{id}','ProductController@destroy')->name('product.destroy');
//
        Route::get('/user', 'UserController@index')->name('user.index');
        Route::get('/add-user','UserController@create')->name('user.create');
        Route::post('/user','UserController@store')->name('user.store');
        Route::get('/destroy-user/{id}','UserController@destroy')->name('user.destroy');

        Route::get('/order', 'OrderController@index')->name('order.index');
        Route::get('/show-order/{id}','OrderController@show')->name('order.show');
        Route::post('/edit-order/{id}','OrderController@edit')->name('order.edit');
        Route::get('/destroy-order/{id}','OrderController@destroy')->name('order.destroy');
//
        Route::get('/comment', 'CommentController@index')->name('comment.index');
        Route::get('/destroy-comment/{id}','CommentController@destroy')->name('comment.destroy');



});

Route::get('/login','AuthController@index')->name('login.index');
Route::post('/store','AuthController@store')->name('login.store');



