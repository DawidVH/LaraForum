<?php
Route::get('/', 'ForumController@index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
