<?php

Route::group(['middleware' => ['auth', 'checkRoleOrSuperadmin']], function () {
    Route::get('/', function ($locale = 'ka') {
        view()->share('local', $locale);
        return view('backend.herd_pages.home');
    });
    Route::group(['prefix' => 'menu/item', 'namespace' => '\TsuCMS\Http\Controllers\Manager'], function () {
        Route::any('{Locale}/add', 'HomeController@add')->name('menu.add');
        Route::get('{Locale}/edit', 'HomeController@edit')->name('menu.edit');
        Route::any('{Locale}/edit/{mid}', 'HomeController@edit')->name('menu.edit.id');
        Route::get('{Locale}/delete', 'HomeController@delete')->name('menu.delete');
        Route::get('{Locale}/delete/{mid}', 'HomeController@delete')->name('menu.delete.id');
    });

    Route::group(['prefix' => 'text/post', 'namespace' => '\TsuCMS\Http\Controllers\Manager'], function () {
        Route::any('{Locale}/add', 'TextController@add')->name('text.add');
        Route::get('{Locale}/edit', 'TextController@edit')->name('text.edit');
        Route::any('{Locale}/edit/{mid}', 'TextController@edit')->name('text.edit.id');
        Route::get('{Locale}/delete', 'TextController@delete')->name('text.delete');
        Route::get('{Locale}/delete/{mid}', 'TextController@delete')->name('text.delete.id');
    });

    Route::group(['prefix' => 'galeri/post', 'namespace' => '\TsuCMS\Http\Controllers\Manager'], function () {
        Route::any('{Locale}/add', 'GaleriController@add')->name('galeri.add');
        Route::get('{Locale}/edit', 'GaleriController@edit')->name('galeri.edit');
        Route::any('{Locale}/edit/{mid}', 'GaleriController@edit')->name('galeri.edit.id');
        Route::any('{Locale}/edit/img/{did}', 'GaleriController@img')->name('galeri.img.edit.id');
        Route::get('{Locale}/delete', 'GaleriController@delete')->name('galeri.delete');
        Route::get('{Locale}/delete/{mid}', 'GaleriController@delete')->name('galeri.delete.id');
    });

});
