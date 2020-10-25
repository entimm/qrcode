<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/link/manage', 'LinkController@index');
Route::get('/link/edit/{id}', 'LinkController@edit');
Route::post('/link/update', 'LinkController@update');
Route::get('/link/delete/{id}', 'LinkController@delete');
Route::get('/link/create', 'LinkController@create');
Route::post('/link/store', 'LinkController@store');

Route::get('/show/{id}', 'ShowController@index');

Route::get('/', 'HomeController@index');
