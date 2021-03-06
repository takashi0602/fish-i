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

Route::get('/', 'TopController@index');

Auth::routes();

Route::get('/list', 'FoodController@index');

Route::get('/mypage', 'UserController@index');

Route::get('/mypage/edit', 'UserController@edit');

Route::post('/mypage/edit/post', 'UserController@post');

Route::get('/mypage/order', 'UserController@order');

Route::get('/cart', 'CartController@index');

Route::post('/cart/add', 'CartController@add');

Route::post('/cart/delete', 'CartController@delete');

Route::get('/confirm', 'CartController@confirm');

Route::post('/decision', 'CartController@decision');
