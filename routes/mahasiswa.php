<?php

Route::get('/', 'Mahasiswa\MahasiswaController@index')->name('mahasiswa.home');
Route::get('/login', 'Mahasiswa\LoginController@showLoginForm')->name('mahasiswa.login');
Route::post('/login', 'Mahasiswa\LoginController@login')->name('mahasiswa.login');
Route::post('/logout', 'Mahasiswa\LoginController@logout')->name('mahasiswa.logout');

Route::get('/daftarkp/{id_tahun}/{id_tempat_kp}', 'Mahasiswa\MahasiswaController@daftarkp');

Route::resource('kegiatan', 'Mahasiswa\KegiatanController');

Route::get('/jurnal', 'Mahasiswa\JurnalController@index')->name('jurnal.index');
Route::post('/jurnal/{id}', 'Mahasiswa\JurnalController@store')->name('jurnal.store');

Route::get('/pemberitahuan', 'Mahasiswa\MahasiswaController@pemberitahuan');
Route::get('/pemberitahuan/terbaca/{id}', 'Mahasiswa\MahasiswaController@terbaca');
