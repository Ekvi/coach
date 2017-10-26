<?php


Auth::routes();

Route::get('/', 'Admin\HomeController@index')->name('home');

Route::get('/home', 'HomeController@index')->name('home');

//Route::group(['prefix' => 'admin', 'middleware' => 'accessToAdminPanel'], function () {
Route::group(['prefix' => 'admin'], function () {
    Route::get('/', 'Admin\HomeController@index')->name('home');
    Route::resource('exercises', 'Admin\ExercisesController');
    //Route::resource('foods', 'Admin\FoodsController');
    Route::get('clients/{clientId}/food', 'Admin\FoodsController@index')->where('clientId', '\d+')->name('food');
    Route::get('clients/{clientId}/food/{day}/edit', 'Admin\FoodsController@edit')->name('edit.food');
    Route::put('clients/{clientId}/food/{day}', 'Admin\FoodsController@update');

    Route::get('clients/{clientId}/trainings', 'Admin\TrainingController@index')->where('clientId', '\d+')->name('trainings');
    Route::get('clients/{clientId}/trainings/{day}/edit', 'Admin\TrainingController@edit')->name('edit.trainings');


    Route::resource('clients', 'Admin\ClientsController');
    Route::resource('coaches', 'Admin\User\CoachesController');
    Route::get('coaches/{id}/password-form', 'Admin\User\CoachesController@passwordForm')->where('id', '\d+');
    Route::post('coaches/change-password', 'Admin\User\CoachesController@changePassword')->name('change-password');
    /*Route::get('clients', [
        'uses' => 'Admin\ClientsController@index',
        'as' => 'clients'
    ]);
    Route::get('coaches', [
        'uses' => 'Admin\User\CoachesController@index',
        'as' => 'coaches'
    ]);*/

    /*Route::resource('categories', 'CategoryController');
    Route::resource('tags', 'TagController');
    Route::get('/articles', 'Admin\ArticleController@index');*/
});

//->where('name', '[A-Za-z]+');
