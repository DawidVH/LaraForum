<?php
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/', 'SectionController@index');
Route::get('/section/{section}', 'SectionController@show');
Route::get('/section/{section}/{thread}', 'ThreadController@show');
Route::post('/section/{section}/create', 'ThreadController@store');

Route::post('/thread/{thread}/post', 'PostController@store');

Route::get('/user/{user}', 'UserController@show');





