<?php


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//Route::group(['prefix' => 'admin', 'middleware' => 'isAdmin'], function () {
Route::group(['prefix' => 'admin'], function () {
    Route::get('/', 'Admin\HomeController@index')->name('home');
    Route::resource('exercises', 'Admin\ExercisesController');
    /*Route::resource('categories', 'CategoryController');
    Route::resource('tags', 'TagController');
    Route::get('/articles', 'Admin\ArticleController@index');*/
});
