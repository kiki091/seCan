<?php

Route::group(['middleware' => ['web']], function() {
	Route::get('/', 'Front\HomeController@index')->name('frontHome');
	Route::get('/tentang-secan', 'Front\AboutController@index')->name('frontAbout');
	Route::get('/artikel', 'Front\NewsController@index')->name('frontNews');
});
