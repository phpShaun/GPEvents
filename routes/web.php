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

Route::get('/',                'EventController@index')->name('event/index');
Route::get('/event/create',    'EventController@create')->name('event/create');
Route::get('/event/list',      'EventController@list')->name('event/list');
Route::get('/event/{id}',      'EventController@get')->name('event');
Route::get('/event/{id}/edit', 'EventController@edit')->name('event/edit');

Route::post('/event',          'EventController@save');

Auth::routes();