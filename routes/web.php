<?php


Auth::routes();

//Route::get('/', 'Admin\HomeController@index')->name('admin.home');
/*Route::group(['middleware' => 'accessToAdminPanel'], function () {
    Route::get('/', 'Admin\HomeController@index')->name('admin.home');
});*/
//Route::get('/', 'Admin\HomeController@index')->name('admin.home');

Route::get('/', 'HomeController@index');
Route::get('/home', 'HomeController@index')->name('home');

//Route::group(['prefix' => 'admin', 'middleware' => 'accessToAdminPanel'], function () {
Route::group(['prefix' => 'admin'], function () {
    Route::get('/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
    Route::post('/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');

    Route::get('/', 'Admin\HomeController@index')->middleware(['auth', 'accessToAdminPanel'])->name('admin.home'); //need to access only logged

    /*Route::group(['middleware' => 'accessToAdminPanel'], function () {
        //Route::post('/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');
        //Route::get('/home', 'Admin\HomeController@index')->name('admin.home');
        Route::get('/', 'Admin\HomeController@index')->middleware('auth')->name('admin.home');
    });*/

    //Route::post('/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');//->middleware('accessToAdminPanel');
    //Route::get('/', 'Admin\HomeController@index')->name('admin.home');//->middleware('accessToAdminPanel');

    Route::middleware(['auth', 'accessToAdminPanel'])->group(function () {
        Route::resource('clients', 'Admin\ClientsController');

        Route::resource('coaches', 'Admin\User\CoachesController');
        Route::get('coaches/{id}/password-form', 'Admin\User\CoachesController@passwordForm')->where('id', '\d+');
        Route::post('coaches/change-password', 'Admin\User\CoachesController@changePassword')->name('change-password');

        Route::get('clients/{clientId}/food', 'Admin\FoodsController@index')->where('clientId', '\d+')->name('food');
        Route::get('clients/{clientId}/food/{day}/edit', 'Admin\FoodsController@edit')->name('edit.food');
        Route::put('clients/{clientId}/food/{day}', 'Admin\FoodsController@update');

        Route::get('clients/{clientId}/trainings', 'Admin\TrainingController@index')->where('clientId', '\d+')->name('trainings');
        Route::get('clients/{clientId}/trainings/{day}/edit', 'Admin\TrainingController@edit')->name('edit.trainings');

        Route::resource('exercises', 'Admin\ExercisesController');
    });


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
