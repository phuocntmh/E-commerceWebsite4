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

Route::get('/','MyController@getIndex');
Route::get('san-pham/{id_type}','MyController@getSanpham');
Route::get('chi-tiet/{id}','MyController@getChitiet');
Route::get('add-cart/{id}','MyController@getAddCart');
Route::get('gio-hang','MyController@getGiohang');
Route::get('del-cart/{id}','MyController@getDelItemCart');
Route::get('dat-hang','MyController@getCheckout');
Route::post('dat-hang','MyController@postCheckout');
Route::get('tim-kiem','MyController@getSearch');
Route::get('lien-he','MyController@getLienhe');
Route::get('dang-ki','MyController@getDangki');
Route::post('dang-ki','MyController@postDangki');
Route::get('dang-nhap','MyController@getDangnhap');
Route::post('dang-nhap','MyController@postDangnhap');
Route::get('dang-xuat','MyController@getDangxuat');
