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

Route::group(['middleware' => 'auth'], function () {
	Route::group(['as' => 'administrator.', 'prefix' => 'admin'], function () {
		Route::get('/', ['as' => 'index', 'uses' => 'AdministratorController@index']);
	});

	Route::group(['as' => 'classes.', 'prefix' => 'clases'], function () {
		Route::get('/', ['as' => 'index', 'uses' => 'ClassesController@index']);
		Route::any('/agregar', ['as' => 'add', 'uses' => 'ClassesController@addclass']);
		Route::any('/alumno/{id}', ['as' => 'byStudent', 'uses' => 'ClassesController@byStudent']);
	});

	Route::group(['as' => 'students.', 'prefix' => 'estudiantes'], function () {
		Route::get('/', ['as' => 'index', 'uses' => 'StudentController@index']);
		Route::any('/agregar', ['as' => 'add', 'uses' => 'StudentController@add']);
		Route::any('/{id}/inscribir', ['as' => 'enroll', 'uses' => 'StudentController@enroll']);
		Route::any('/{id}/desinscribir', ['as' => 'disenroll', 'uses' => 'StudentController@disenroll']);
		Route::any('/{id}/calificar/{clase}', ['as' => 'grade', 'uses' => 'StudentController@grade']);
		Route::any('/{id}/calificar/{clase}/parcial/{parcial}', ['as' => 'grade.partial', 'uses' => 'StudentController@gradePartial']);
	});

	Route::group(['as' => 'teacher.', 'prefix' => 'maestro'], function () {
		Route::get('/', ['as' => 'index', 'uses' => 'TeacherController@index']);
		Route::get('/clase/{id}', ['as' => 'class', 'uses' => 'Teacher\ClassController@index']);
	});

	Route::group(['as' => 'subjects.', 'prefix' => 'materias'], function () {
		Route::get('/', ['as' => 'index', 'uses' => 'SubjectController@index']);
		Route::any('/agregar', ['as' => 'add', 'uses' => 'SubjectController@add']);
	});

	Route::group(['as' => 'levels.', 'prefix' => 'nivel'], function () {
		Route::get('/', ['as' => 'index', 'uses' => 'LevelController@index']);
		Route::any('/agregar', ['as' => 'add', 'uses' => 'LevelController@add']);
	});
});