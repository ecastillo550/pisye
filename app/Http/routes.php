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

//Route::auth();

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
});

Route::group(['as' => 'teacher::', 'prefix' => 'maestro'], function () {
	Route::get('/index', ['as' => 'index', 'uses' => 'Teacher\MainController@index']);
});

Route::get('/home', 'HomeController@index');
Route::get('/class', 'TeacherController@classIndex');
Route::get('/administrator/students', ['as' => 'administrator.students', 'uses' => 'Administrator\MainController@students']);
Route::any('/administrator/students/add', ['as' => 'administrator.students.add', 'uses' => 'Administrator\MainController@addStudent']);

Route::get('/administrator/classes', ['as' => 'administrator.classes', 'uses' => 'Administrator\MainController@classes']);
Route::any('/administrator/classes/add', ['as' => 'administrator.classes.add', 'uses' => 'Administrator\MainController@addclass']);

Route::get('/administrator/subjects', ['as' => 'administrator.subjects', 'uses' => 'Administrator\MainController@subjects']);
Route::any('/administrator/subjects/add', ['as' => 'administrator.subjects.add', 'uses' => 'Administrator\MainController@addSubject']);


