<?php
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/', 'SectionController@index');
Route::get('/section/{section}', 'SectionController@show');
Route::get('/section/{section}/{thread}', 'ThreadController@show');
Route::post('/section/{section}/create', ['middleware' => 'auth', 'uses' => 'ThreadController@store']);

Route::delete('/thread/{thread}', ['middleware' => 'auth', 'uses' => 'ThreadController@destroy'])->name('delete.thread');

Route::delete('/post/{post}', ['middleware' => 'auth', 'uses' => 'PostController@destroy'])->name('delete.post');
Route::post('/post/{thread}', ['middleware' => 'auth', 'uses' => 'PostController@store'])->name('store.post');

Route::get('/user/{user}', 'UserController@show');





