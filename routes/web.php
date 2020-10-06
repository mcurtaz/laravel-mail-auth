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

Auth::routes();

Route::get('/', 'GuestController@index') -> name('post-index');
Route::get('/show/{id}', 'GuestController@show') -> name('post-show');

Route::get('/delete/{id}', 'LoggedController@delete') -> name('post-delete');

Route::get('/edit/{id}', 'LoggedController@edit') -> name('post-edit');

Route::post('/update/{id}', 'LoggedController@update') -> name('post-update');

Route::get('/create', 'LoggedController@create') -> name('post-create');

Route::post('/create', 'LoggedController@store') -> name('post-store');
