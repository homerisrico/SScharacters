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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/','SSCharacters@index');

Route::resource('saint','SSCharacters')->middleware('auth');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('/imagen','ImagenController');

Route::get('/saintdelete/{id}','ImagenController@destroy')->name('delete');

//Route::get('/saint','SSCharacters@index')->name('index');

Route::get('/sesion/{form}','SesionController@formu');

Route::resource('/clase','ClaseClontroller');
