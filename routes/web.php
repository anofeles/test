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
Auth::routes();

Route::group(['namespace' => '\TsuCMS\Http\Controllers\Frontend'], function () {
    Route::get('/', 'WebController@index')->name('home');
    Route::get('{locale}/categori/{catid}/{slug}','WebController@index')->name('categori.viu');
    Route::get('{locale}/page/{slug}/{id}','WebController@info')->name('info.viuv');
    Route::get('{locale}/pagegaleri/{slug}/{gid}', 'WebController@pagegaleri')->name('page.galeri');
    Route::get('{locale}/data/{postd}', 'WebController@postdata')->name('page.date');

    Route::any('{locale}/search','WebController@search')->name('post.serch');
//    Route::any('{locale}/galeri/', 'WebController@galery')->name('galeri.add');
//    Route::any('{locale}/add/', 'WebController@inser');
//    Route::any('{locale}/menuadd/', 'WebController@menuinsert');
});
