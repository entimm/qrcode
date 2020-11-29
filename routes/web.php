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

Route::get('/manage/groups', 'LinkController@index')->name('manage.groups');
Route::get('groups/{link}/delete', ['as' => 'groups.delete', 'uses' => 'GroupController@destroy']);
Route::resource('groups', 'GroupController')->except('index');

Route::get('/manage/links', 'LinkController@index')->name('manage.links');
Route::get('links/{link}/delete', ['as' => 'links.delete', 'uses' => 'LinkController@destroy']);
Route::resource('links', 'LinkController')->except('index');

Route::get('/{group?}', 'HomeController@index')->where('group', '[0-9]+');
