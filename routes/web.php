<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');

Route::group([
    'prefix' => 'menu',
    'as' => 'menu.'
], function () {
    Route::get('/', 'Manage\MenuController@index')->name('index');
});

Route::group([
    'prefix' => 'permission',
    'as' => 'permission.',
    'middleware' => ['auth']
], function () {
    Route::get('/', 'Manage\PermissionController@index')->name('index');
    Route::get('/view/{id}', 'Manage\PermissionController@show')->name('view');
    Route::get('/add', 'Manage\PermissionController@create')->name('add');
    Route::post('/add', 'Manage\PermissionController@store')->name('store');
    Route::get('/edit/{id}', 'Manage\PermissionController@edit')->name('edit');
    Route::post('/update/{id}', 'Manage\PermissionController@update')->name('update');
    Route::get('/delete/{id}', 'Manage\PermissionController@destroy')->name('delete');
});

Route::group([
    'prefix' => 'user',
    'as' => 'user.',
    'middleware' => ['auth']
], function () {
    Route::get('/', 'Manage\UserController@index')->name('index');
    Route::get('/view/{id}', 'Manage\UserController@show')->name('view');
    Route::get('/add', 'Manage\UserController@create')->name('add');
    Route::post('/add', 'Manage\UserController@store')->name('store');
    Route::get('/edit/{id}', 'Manage\UserController@edit')->name('edit');
    Route::post('/update/{id}', 'Manage\UserController@update')->name('update');
    Route::get('/delete/{id}', 'Manage\UserController@destroy')->name('delete');
});

Route::group([
    'prefix' => 'user-permission',
    'as' => 'user_permission.',
    'middleware' => ['auth']
], function () {
    Route::get('/', 'Manage\UserPermissionController@index')->name('index');
    Route::get('/view/{id}', 'Manage\UserPermissionController@show')->name('view');
    Route::get('/edit/{id}', 'Manage\UserPermissionController@edit')->name('edit');
    Route::post('/update/{id}', 'Manage\UserPermissionController@update')->name('update');
    Route::get('/delete/{id}', 'Manage\UserPermissionController@destroy')->name('delete');
});



//Route::get('wizard/user/{step?}', 'UserWizardController@wizard')->name('wizard.user');
//Route::post('wizard/user/{step}', 'UserWizardController@wizardPost')->name('wizard.user.post');





