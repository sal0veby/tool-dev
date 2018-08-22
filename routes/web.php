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
    'prefix' => 'class',
    'as' => 'class.',
    'middleware' => ['auth']
], function () {
    Route::get('/', 'Manage\ClassController@index')->name('index');
    Route::get('/{id}/view', 'Manage\ClassController@show')->name('view');
    Route::get('/add', 'Manage\ClassController@create')->name('add');
    Route::post('/add', 'Manage\ClassController@store')->name('store');
    Route::get('/{id}/edit', 'Manage\ClassController@edit')->name('edit');
    Route::post('/{id}/update', 'Manage\ClassController@update')->name('update');
    Route::delete('/{id}/delete', 'Manage\ClassController@destroy')->name('delete');
});

Route::group([
    'prefix' => 'location',
    'as' => 'location.',
    'middleware' => ['auth']
], function () {
    Route::get('/', 'Manage\LocationController@index')->name('index');
    Route::get('/{id}/view', 'Manage\LocationController@show')->name('view');
    Route::get('/add', 'Manage\LocationController@create')->name('add');
    Route::post('/add', 'Manage\LocationController@store')->name('store');
    Route::get('/{id}/edit', 'Manage\LocationController@edit')->name('edit');
    Route::post('/{id}/update', 'Manage\LocationController@update')->name('update');
    Route::delete('/{id}/delete', 'Manage\LocationController@destroy')->name('delete');

    Route::get('/getLocationList', 'Manage\LocationController@getLocationList')->name('getLocationList');
});

Route::group([
    'prefix' => 'work-type',
    'as' => 'work_type.',
    'middleware' => ['auth']
], function () {
    Route::get('/', 'Manage\WorkTypeController@index')->name('index');
    Route::get('/{id}/view', 'Manage\WorkTypeController@show')->name('view');
    Route::get('/add', 'Manage\WorkTypeController@create')->name('add');
    Route::post('/add', 'Manage\WorkTypeController@store')->name('store');
    Route::get('/{id}/edit', 'Manage\WorkTypeController@edit')->name('edit');
    Route::post('/{id}/update', 'Manage\WorkTypeController@update')->name('update');
    Route::delete('/{id}/delete', 'Manage\WorkTypeController@destroy')->name('delete');
});

Route::group([
    'prefix' => 'permission',
    'as' => 'permission.',
    'middleware' => ['auth']
], function () {
    Route::get('/', 'Manage\PermissionController@index')->name('index');
    Route::get('/{id}/view', 'Manage\PermissionController@show')->name('view');
    Route::get('/add', 'Manage\PermissionController@create')->name('add');
    Route::post('/add', 'Manage\PermissionController@store')->name('store');
    Route::get('/{id}/edit', 'Manage\PermissionController@edit')->name('edit');
    Route::post('/{id}/update', 'Manage\PermissionController@update')->name('update');
    Route::delete('/{id}/delete', 'Manage\PermissionController@destroy')->name('delete');
});

Route::group([
    'prefix' => 'user',
    'as' => 'user.',
    'middleware' => ['auth']
], function () {
    Route::get('/', 'Manage\UserController@index')->name('index');
    Route::get('/{id}/view', 'Manage\UserController@show')->name('view');
    Route::get('/add', 'Manage\UserController@create')->name('add');
    Route::post('/add', 'Manage\UserController@store')->name('store');
    Route::get('/{id}/edit', 'Manage\UserController@edit')->name('edit');
    Route::post('/{id}/update', 'Manage\UserController@update')->name('update');
    Route::delete('/{id}/delete', 'Manage\UserController@destroy')->name('delete');
});

Route::group([
    'prefix' => 'user-permission',
    'as' => 'user_permission.',
    'middleware' => ['auth']
], function () {
    Route::get('/', 'Manage\UserPermissionController@index')->name('index');
    Route::get('/{id}/view', 'Manage\UserPermissionController@show')->name('view');
    Route::get('/{id}/edit', 'Manage\UserPermissionController@edit')->name('edit');
    Route::post('/{id}/update', 'Manage\UserPermissionController@update')->name('update');
    Route::delete('/{id}/delete', 'Manage\UserPermissionController@destroy')->name('delete');
});

Route::group([
    'prefix' => 'manage-step',
    'as' => 'manage_step.',
    'middleware' => ['auth']
], function () {
    Route::get('/', 'ManageStepController@index')->name('index');
    Route::post('/update', 'ManageStepController@update')->name('update');
});

Route::group([
    'prefix' => 'job-list',
    'as' => 'job_list.',
    'middleware' => ['auth']
], function () {
    Route::get('/', 'JobListController@index')->name('index');
    Route::post('/update', 'JobListController@update')->name('update');
});

//Route::get('/user/{step?}', 'UserWizardController@wizard')->name('wizard.user');

//Route::get('wizard/user/{step?}', 'UserWizardController@wizard')->name('wizard.user');
//Route::post('wizard/user/{step}', 'UserWizardController@wizardPost')->name('wizard.user.post');





