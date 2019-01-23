<?php

Route::get('/', 'Dosen\DosenController@index')->name('dosen.home');
Route::get('/login', 'Dosen\LoginController@showLoginForm')->name('dosen.login');
Route::post('/login', 'Dosen\LoginController@login')->name('dosen.login');
Route::post('/logout', 'Dosen\LoginController@logout')->name('dosen.logout');

Route::resource('tempatkp3', 'Dosen\TempatKpController');

Route::get('/kerja-praktek', 'Dosen\KpController@index')->name('dosen.home');
Route::get('/kerja-praktek/detail/{id_tahun}/{id_tempat_kp}', 'Dosen\KpController@show');

Route::resource('pembimbing', 'Dosen\PembimbingController');
Route::get('pembimbing/tambah/{id_tahun}/{id_tempat_kp}', 'Dosen\PembimbingController@create')->name('pembimbing.tambah');
