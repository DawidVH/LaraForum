<?php
Route::get('/', 'SectionController@index');
Route::get('/section/{section}', 'SectionController@show');
//Route::get('/section/{section}/create', 'SectionController@create');
Route::get('/thread/{thread}', 'ThreadController@show');
Route::post('/thread/{thread}/post', 'PostController@store');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
