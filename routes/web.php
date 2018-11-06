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

Route::get('/', 'TaskController@index')->name('index');
Route::post('/tasks', 'TaskController@store')->name('store.task');
Route::get('/tasks/{id}', 'TaskController@edit')->name('edit.task');
Route::put('/tasks/{id}', 'TaskController@update')->name('update.task');
Route::delete('/tasks/{id}', 'TaskController@destroy')->name('remove.task');
