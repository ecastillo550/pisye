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
    Route::group(['prefix' => 'administrador', 'as' => 'admin.'], function() {
        Route::get('/', 'AdminController@index')->name('index');
        Route::get('/crear', 'AdminController@create')->name('create');
        Route::post('/crear', 'AdminController@store')->name('store');
        Route::get('/{id}/editar', 'AdminController@edit')->name('edit');
        Route::put('/{id}/editar', 'AdminController@update')->name('update');
        Route::delete('/{id}', 'AdminController@destroy')->name('delete');
    });

    Route::group(['prefix' => 'alumnos', 'as' => 'students.'], function() {
        Route::get('/', 'StudentsController@index')->name('index');
        Route::get('/crear', 'StudentsController@create')->name('create');
        Route::post('/crear', 'StudentsController@store')->name('store');
        Route::get('/{id}/editar', 'StudentsController@edit')->name('edit');
        Route::put('/{id}/editar', 'StudentsController@update')->name('update');
        Route::delete('/{id}', 'StudentsController@destroy')->name('delete');
    });

    Route::group(['prefix' => 'grupos', 'as' => 'groups.'], function() {
        Route::get('/', 'GroupsController@index')->name('index');
        Route::get('/mis_grupos', 'GroupsController@myGroups')->name('my_groups');
        Route::get('/{id}/lista', 'GroupsController@listGroups')->name('student_list');
        Route::get('/{id}/inscrito', 'GroupsController@enrolled')->name('enrolled');
        Route::post('/{id}/inscribir', 'GroupsController@enrollLevel')->name('enroll_level');
        Route::get('/crear', 'GroupsController@create')->name('create');
        Route::post('/crear', 'GroupsController@store')->name('store');
        Route::get('/{id}/editar', 'GroupsController@edit')->name('edit');
        Route::put('/{id}/editar', 'GroupsController@update')->name('update');
        Route::delete('/{id}', 'GroupsController@destroy')->name('delete');
    });

    Route::group(['prefix' => 'calificacion', 'as' => 'grades.'], function() {
        Route::get('/', 'GradesController@index')->name('index');
        Route::get('/parcial', 'GradesController@create')->name('create');
        Route::post('/parcial', 'GradesController@store')->name('store');
        Route::get('/{id}/editar', 'GradesController@edit')->name('edit');
        Route::put('/{id}/editar', 'GradesController@update')->name('update');
    });

    Route::group(['prefix' => 'semestres', 'as' => 'semesters.'], function() {
        Route::get('/', 'SemestersController@index')->name('index');
        Route::get('/crear', 'SemestersController@create')->name('create');
        Route::post('/crear', 'SemestersController@store')->name('store');
        Route::get('/{id}/editar', 'SemestersController@edit')->name('edit');
        Route::put('/{id}/editar', 'SemestersController@update')->name('update');
        Route::delete('/{id}', 'SemestersController@destroy')->name('delete');
    });

    Route::group(['prefix' => 'materias', 'as' => 'subjects.'], function() {
        Route::get('/', 'SubjectsController@index')->name('index');
        Route::get('/crear', 'SubjectsController@create')->name('create');
        Route::post('/crear', 'SubjectsController@store')->name('store');
        Route::get('/{id}/editar', 'SubjectsController@edit')->name('edit');
        Route::put('/{id}/editar', 'SubjectsController@update')->name('update');
        Route::delete('/{id}', 'SubjectsController@destroy')->name('delete');
    });

    Route::group(['prefix' => 'niveles', 'as' => 'levels.'], function() {
        Route::get('/', 'LevelsController@index')->name('index');
        Route::get('/crear', 'LevelsController@create')->name('create');
        Route::post('/crear', 'LevelsController@store')->name('store');
        Route::get('/{id}/editar', 'LevelsController@edit')->name('edit');
        Route::put('/{id}/editar', 'LevelsController@update')->name('update');
        Route::delete('/{id}', 'LevelsController@destroy')->name('delete');
    });

    Route::group(['prefix' => 'users', 'as' => 'users.'], function() {
        Route::get('/', ['as' => 'index', 'uses' => 'UsersController@index']);
        Route::get('/create', ['as' => 'create', 'uses' =>'UsersController@create']);
        Route::post('/', ['as' => 'store', 'uses' =>'UsersController@store']);
        Route::get('/{id}', ['as' => 'show', 'uses' => 'UsersController@show']);
        Route::get('/{id}/edit', ['as' => 'edit', 'uses' => 'UsersController@edit']);
        Route::get('/{id}/restore', ['as' => 'restore', 'uses' => 'UsersController@restore']);
        Route::put('/{id}', ['as' => 'update', 'uses' =>'UsersController@update']);
        Route::delete('/{id}', ['as' => 'destroy', 'uses' =>'UsersController@destroy']);
    });
});