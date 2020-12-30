<?php

Route::group(['middleware' => ['web']], function() {
	Route::get('/', 'Front\HomeController@index')->name('frontHome');
	Route::get('/tentang-secan', 'Front\AboutController@index')->name('frontAbout');
	Route::get('/artikel', 'Front\NewsController@index')->name('frontNews');
	Route::get('/artikel/{slug}', 'Front\NewsController@detail')->name('frontNewsDetail');
	Route::get('/video', 'Front\VideoController@index')->name('frontVideo');
	Route::get('/video/{slug}', 'Front\VideoController@detail')->name('frontVideoDetail');
	Route::get('/dokter', 'Front\DoctorController@index')->name('frontDoctor');
	Route::get('/dokter/artikel', 'Front\DoctorController@article')->name('frontDoctorArticle');
	Route::get('/dokter/video', 'Front\DoctorController@video')->name('frontDoctorVideo');


	Route::get('/login', 'Auth\LoginController@index')->name('login');
});
