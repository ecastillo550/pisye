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

Route::get('/login', 'Auth\LoginController@showLoginForm')->name('login');
Route::get('/logout', 'Auth\LoginController@logout');
Route::get('/', 'HomeController@index')->name('home');

Auth::routes();

Route::group(['middleware' => ['web', 'auth']], function() {
    Route::group(['prefix' => 'administrador', 'as' => 'admins.', function() {
        Route::get('/', 'StudentController@index')->name('index');
        Route::get('/crear', 'StudentController@create')->name('create');
        Route::post('/crear', 'StudentController@store')->name('store');
        Route::get('/{id}/editar', 'StudentController@edit')->name('edit');
        Route::put('/{id}/editar', 'StudentController@update')->name('update');
        Route::delete('/{id}', 'StudentController@destroy')->name('delete');
    });
});