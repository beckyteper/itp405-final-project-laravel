<?php

use App\ActiveTask;
use App\ArchivedTask;

Route::get('/', 'TaskController@home');

Route::get('/login', 'LoginController@index');
Route::post('/login', 'LoginController@login');
Route::get('/logout', 'LoginController@logout');

Route::get('/signup', 'SignupController@index');
Route::post('/signup', 'SignupController@signup');

Route::get('/active-tasks', 'TaskController@indexActiveTasks')->middleware('protected');
Route::post('/active-tasks', 'TaskController@createActiveTask');
Route::get('/archived-tasks', 'TaskController@indexArchivedTasks');

Route::get('/active-tasks/{id}', 'TaskController@singleActiveTask');
Route::get('/active-tasks/{id}/edit', 'TaskController@edit');
Route::post('/active-tasks/{id}/update', 'TaskController@update');

Route::get('/archived-tasks/{id}', 'TaskController@singleArchivedTask');
Route::get('/archived-tasks/{id}/delete', 'TaskController@destroy');

Route::get('/active-tasks/{id}/archive', 'TaskController@archive');
Route::get('/archived-tasks/{id}/activate', 'TaskController@activate');
