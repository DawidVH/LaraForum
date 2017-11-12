<?php
Route::get('/', 'SectionController@index');
Route::get('/section/{section}', 'SectionController@show');
Route::post('/section/{section}/create', 'ThreadController@store');
Route::get('/thread/{thread}', 'ThreadController@show');
Route::post('/thread/{thread}/post', 'PostController@store');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
