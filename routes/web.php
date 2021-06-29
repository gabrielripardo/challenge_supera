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
Route::get('/', 'AutomovelController@index')->name('automovel.index');

Route::get('automoveis/show/{id}', 'AutomovelController@show')->name('automovel.show'); //Detalhes do automovel
// Route::get('automovels', 'ProductController@index')->name('products.index'); //Listar os automoveis
Route::any('automoveis/search', 'AutomovelController@search')->name('automovel.search');

Route::get('automoveis/create', 'AutomovelController@create')->name('automovel.create')->middleware('auth'); //Formulário para cadastrar o automovel
Route::get('automoveis/create', 'AutomovelController@create')->name('automovel.create')->middleware('auth'); //Formulário para cadastrar o automovel
// Route::delete('automovels/{id}', 'ProductController@destroy')->name('products.destroy')->middleware('auth'); //Deleta automovel
Route::put('automoveis/{id}/update', 'AutomovelController@update')->name('automovel.update')->middleware('auth'); //Altera o automovel
Route::get('automoveis/{id}/edit', 'AutomovelController@edit')->name('automovel.edit')->middleware('auth'); //Formulário para editar automovel
Route::post('automoveis', 'AutomovelController@store')->name('automovel.store')->middleware('auth'); //Armazenar o automovel

Route::get('/login', 'UserController@login')->name('login.page');
Route::get('/logout', 'UserController@logout')->name('logout');
Route::post('/login/auth', 'UserController@auth')->name('auth.user');


// Route::get('/', function () {
//     return view('index');
// });

