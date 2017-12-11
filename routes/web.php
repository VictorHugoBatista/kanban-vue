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

Route::get('/', function () {
    return view('welcome');
});

// Rotas das páginas
Route::get('/project/all', ['uses' => 'ProjectPageController@index']);

// Endpoints api
Route::get('/tasks', ['uses' => 'TaskController@index']);

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
