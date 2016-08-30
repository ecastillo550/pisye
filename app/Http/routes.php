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

Route::group(['as' => 'auth.', 'prefix' => 'auth'], function () {
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

Route::group(['as' => 'administrator.', 'prefix' => 'admin'], function () {
	Route::get('/index', ['as' => 'index', 'uses' => 'Administrator\MainController@index']);
	
	Route::get('/clases', ['as' => 'classes', 'uses' => 'Administrator\MainController@classes']);
	Route::any('/clases/add', ['as' => 'classes.add', 'uses' => 'Administrator\MainController@addclass']);

	Route::get('/materias', ['as' => 'subjects', 'uses' => 'Administrator\MainController@subjects']);
	Route::any('/materias/add', ['as' => 'subjects.add', 'uses' => 'Administrator\MainController@addSubject']);
});

Route::group(['as' => 'students.', 'prefix' => 'estudiantes'], function () {
	Route::get('/', ['as' => 'index', 'uses' => 'Student\MainController@index']);
	Route::any('/agregar', ['as' => 'add', 'uses' => 'Student\MainController@addStudent']);
	Route::any('/{id}/clases', ['as' => 'classes', 'uses' => 'Student\MainController@classes']);
	Route::any('/{id}/inscribir', ['as' => 'enroll', 'uses' => 'Student\MainController@enroll']);
	Route::any('/{id}/desinscribir', ['as' => 'disenroll', 'uses' => 'Student\MainController@disenroll']);
	Route::any('/{id}/calificar/{clase}', ['as' => 'grade', 'uses' => 'Student\MainController@grade']);
	Route::any('/{id}/calificar/{clase}/parcial/{parcial}', ['as' => 'grade.partial', 'uses' => 'Student\MainController@gradePartial']);
});

Route::group(['as' => 'teacher.', 'prefix' => 'maestro'], function () {
	Route::get('/', ['as' => 'index', 'uses' => 'Teacher\MainController@index']);
	Route::get('/clase/{id}', ['as' => 'class', 'uses' => 'Teacher\ClassController@index']);
});