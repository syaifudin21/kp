<?php

Route::get('/', 'Pembimbing\PembimbingController@index')->name('pembimbing.home');
Route::get('/login', 'Pembimbing\LoginController@showLoginForm')->name('pembimbing.login');
Route::post('/login', 'Pembimbing\LoginController@login')->name('pembimbing.login');
Route::post('/logout', 'Pembimbing\LoginController@logout')->name('pembimbing.logout');

Route::get('/kegiatan', 'Pembimbing\PembimbingController@kegiatan');
Route::get('/kegiatan/verifikasi/{id}', 'Pembimbing\PembimbingController@verifikasi')->name('kegiatan.verifikasi');

