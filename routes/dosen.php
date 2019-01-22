<?php

Route::get('/', 'Dosen\DosenController@index')->name('dosen.home');
Route::get('/login', 'Dosen\LoginController@showLoginForm')->name('dosen.login');
Route::post('/login', 'Dosen\LoginController@login')->name('dosen.login');
Route::post('/logout', 'Dosen\LoginController@logout')->name('dosen.logout');
