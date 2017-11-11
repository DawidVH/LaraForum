<?php
Route::get('/', 'SectionController@index');
Route::get('/section/{section}', 'SectionController@show');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
