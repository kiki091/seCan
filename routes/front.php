<?php

Route::group(['middleware' => ['web']], function() {
	Route::group(['prefix' => LaravelLocalization::setLocale()], function() {
		Route::get('/', 'Front\HomeController@index')->name('frontHome');
		Route::post('/contact/submit', 'Front\HomeController@storeContact')->name('storeContact');
		Route::post('/subscribe', 'Front\HomeController@storeSubscribe')->name('storeSubscribe');
		Route::get('/tentang-secan', 'Front\AboutController@index')->name('frontAbout');
		Route::get('/artikel', 'Front\NewsController@index')->name('frontNews');
		Route::get('/artikel/{slug}', 'Front\NewsController@detail')->name('frontNewsDetail');
		Route::get('/artikel/category/{slug}', 'Front\NewsController@category')->name('frontNewsCategory');
		Route::get('/video', 'Front\VideoController@index')->name('frontVideo');
		Route::get('/video/{slug}', 'Front\VideoController@detail')->name('frontVideoDetail');
		Route::get('/video/category/{slug}', 'Front\VideoController@category')->name('frontVideoCategory');
		Route::get('/dokter', 'Front\DoctorController@index')->name('frontDoctor');
		Route::get('/dokter/artikel', 'Front\DoctorController@article')->name('frontDoctorArticle');
		Route::get('/dokter/video', 'Front\DoctorController@video')->name('frontDoctorVideo');

		Route::get('/login', 'Auth\LoginController@index')->name('login');
	});
});
