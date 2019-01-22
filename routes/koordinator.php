<?php

Route::get('/', 'Koordinator\KoordinatorController@index')->name('koordinator.home');
Route::get('/login', 'Koordinator\LoginController@showLoginForm')->name('koordinator.login');
Route::post('/login', 'Koordinator\LoginController@login')->name('koordinator.login');
Route::post('/logout', 'Koordinator\LoginController@logout')->name('koordinator.logout');
