<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', ['as' => 'root', 'uses' => 'UserController@index']);

Route::group(['as' => 'auth::', 'prefix' => 'auth'], function () {
	// Route::post('/registration', [
	// 	'as' => 'register', 
	// 	'uses' => 'Auth\AuthController@register'
	// ]);

	Route::get('/login', ['as' => 'login', 'uses' => 'Auth\AuthController@getLogin']);

	Route::post('/login', [
		'as' => 'login',
		'uses' => 'Auth\AuthController@authenticate'
	]);

	Route::get('/logout', [
		'as' => 'logout',
		'uses' => 'Auth\AuthController@logout'
	]);
});

Route::group(['as' => 'administrator::', 'prefix' => 'admin'], function () {
	Route::get('/index', ['as' => 'index', 'uses' => 'Administrator\MainController@index']);

	Route::get('/students', ['as' => 'students', 'uses' => 'Administrator\MainController@students']);
	Route::any('/students/add', ['as' => 'students.add', 'uses' => 'Administrator\MainController@addStudent']);
	
	Route::get('/classes', ['as' => 'classes', 'uses' => 'Administrator\MainController@classes']);
	Route::any('/classes/add', ['as' => 'classes.add', 'uses' => 'Administrator\MainController@addclass']);

	Route::get('/subjects', ['as' => 'subjects', 'uses' => 'Administrator\MainController@subjects']);
	Route::any('/subjects/add', ['as' => 'subjects.add', 'uses' => 'Administrator\MainController@addSubject']);
});

Route::group(['as' => 'teacher::', 'prefix' => 'maestro'], function () {
	Route::get('/index', ['as' => 'index', 'uses' => 'Teacher\MainController@index']);
	Route::get('/class/{id}', ['as' => 'class', 'uses' => 'Teacher\ClassController@index']);
});