<?php

Route::get('/', 'Koordinator\KoordinatorController@index')->name('koordinator.home');
Route::get('/login', 'Koordinator\LoginController@showLoginForm')->name('koordinator.login');
Route::post('/login', 'Koordinator\LoginController@login')->name('koordinator.login');
Route::post('/logout', 'Koordinator\LoginController@logout')->name('koordinator.logout');

Route::resource('tempatkp1', 'Koordinator\TempatKpController');

//kelompok

Route::get('/pendaftar', 'Koordinator\PendaftarController@index');
Route::get('/pendaftar/detail/{id_tahun}/{id_tempat_kp}', 'Koordinator\PendaftarController@show');
Route::get('/pendaftar/diterima/{id}', 'Koordinator\PendaftarController@diterima');
Route::get('/pendaftar/ditolak/{id}', 'Koordinator\PendaftarController@ditolak');
Route::post('/pendaftar/dosenpembimbing', 'Koordinator\PendaftarController@storedosen')->name('dosenpembimbing.store');
Route::put('/pendaftar/dosenpembimbing', 'Koordinator\PendaftarController@updatedosen')->name('dosenpembimbing.update');
