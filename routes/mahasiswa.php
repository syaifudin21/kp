<?php

Route::get('/', 'Mahasiswa\MahasiswaController@index')->name('mahasiswa.home');
Route::get('/login', 'Mahasiswa\LoginController@showLoginForm')->name('mahasiswa.login');
Route::post('/login', 'Mahasiswa\LoginController@login')->name('mahasiswa.login');
Route::post('/logout', 'Mahasiswa\LoginController@logout')->name('mahasiswa.logout');
