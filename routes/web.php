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


Route::get('/', 'pages\HomepageController@index');
Route::get('/bazeni', 'pages\BazeniController@index');
Route::get('/termini', 'pages\TerminiController@index');

Route::post('/prijava/create','PrijavaController@createPrijava');

Route::put('/prijava/{id}','PrijavaController@updatePrijava');
Route::get('/termin/get-sve','TerminController@getAll');
Route::get('/bazen/get-sve','BazenController@getAll');
Route::get('/bazen/{id}','BazenController@show');