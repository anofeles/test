<?php
//Auth::routes();

Route::group(['namespace'=>'\HerdCMS\Http\Controllers\Frontend'], function () {
    Route::get('/', 'WebController@index')->name('base.home');
});
