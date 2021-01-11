<?php

Route::get('/home', function() {
	return redirect(route('dashboard'));
});

Route::group(['middleware' => ['auth']], function() {
    Route::group(['prefix' => 'cms'], function () {

        Route::get('/dashboard', 'Cms\DashboardController@index')->name('dashboard');

        Route::group(['prefix' => 'banner'], function () {
            Route::get('/', 'Cms\BannerController@index')->name('indexBanner');
            Route::get('/data', 'Cms\BannerController@data')->name('dataBanner');
            Route::get('/edit/{id}', 'Cms\BannerController@edit')->name('editBanner');
            Route::post('/store', 'Cms\BannerController@store')->name('storeBanner');
            Route::post('/delete', 'Cms\BannerController@delete')->name('deleteBanner');
        });

        Route::group(['prefix' => 'news'], function () {
            Route::get('/', 'Cms\NewsController@index')->name('indexNews');
            Route::get('/data', 'Cms\NewsController@data')->name('dataNews');
            Route::get('/edit/{id}', 'Cms\NewsController@edit')->name('editNews');
            Route::post('/store', 'Cms\NewsController@store')->name('storeNews');
            Route::post('/delete', 'Cms\NewsController@delete')->name('deleteNews');
        });

        Route::group(['prefix' => 'seo'], function () {
            Route::get('/', 'Cms\SeoController@index')->name('indexSeo');
            Route::get('/data', 'Cms\SeoController@data')->name('dataSeo');
            Route::get('/edit/{id}', 'Cms\SeoController@edit')->name('editSeo');
            Route::post('/store', 'Cms\SeoController@store')->name('storeSeo');
        });
    });
});