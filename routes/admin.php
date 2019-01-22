<?php

Route::get('/', 'Admin\AdminController@index')->name('admin.home');
Route::get('/login', 'Admin\LoginController@showLoginForm')->name('admin.login');
Route::post('/login', 'Admin\LoginController@login')->name('admin.login');
Route::post('/logout', 'Admin\LoginController@logout')->name('admin.logout');

Route::resource('prodi', 'Admin\ProdiController');
Route::resource('ta', 'Admin\TahunAjaranController');
Route::resource('mahasiswa', 'Admin\MahasiswaController');
Route::resource('dosen', 'Admin\DosenController');
Route::resource('koordinator', 'Admin\KoordinatorController');
