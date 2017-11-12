<?php
Route::get('/', 'SectionController@index');
Route::get('/section/{section}', 'SectionController@show');
Route::get('/section/{section}/{thread}', 'ThreadController@show');
Route::get('/user/{user}', 'UserController@show');

Route::post('/section/{section}/create', 'ThreadController@store');
Route::post('/thread/{thread}/post', 'PostController@store');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
