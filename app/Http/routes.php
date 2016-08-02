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

Route::get('/', function () {
    return view('welcome');
});

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

	// Route::get('/logout', [
	// 	'as' => 'logout',
	// 	'uses' => 'Auth\AuthController@logout'
	// ]);
});

Route::get('/home', 'HomeController@index');
Route::get('/class', 'TeacherController@classIndex');
Route::get('/administrator/students', ['as' => 'administrator.students', 'uses' => 'AdministratorController@students']);
Route::any('/administrator/students/add', ['as' => 'administrator.students.add', 'uses' => 'AdministratorController@addStudent']);

Route::get('/administrator/classes', ['as' => 'administrator.classes', 'uses' => 'AdministratorController@classes']);
Route::any('/administrator/classes/add', ['as' => 'administrator.classes.add', 'uses' => 'AdministratorController@addclass']);

Route::get('/administrator/subjects', ['as' => 'administrator.subjects', 'uses' => 'AdministratorController@subjects']);
Route::any('/administrator/subjects/add', ['as' => 'administrator.subjects.add', 'uses' => 'AdministratorController@addSubject']);


