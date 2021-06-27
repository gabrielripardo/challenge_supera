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
Route::get('/', 'AutomovelController@index');


// Route::get('/', function () {
//     return view('index');
// });

Route::get('automoveis/create', 'AutomovelController@create')->name('automovel.create'); //Formulário para cadastrar o produto
Route::post('automoveis', 'AutomovelController@store')->name('automovel.store'); //Armazenar o produto
// Route::delete('produtos/{id}', 'ProductController@destroy')->name('products.destroy'); //Deleta produto
Route::put('automoveis/{id}/update', 'AutomovelController@update')->name('automovel.update'); //Altera o produto
Route::get('automoveis/{id}/edit', 'AutomovelController@edit')->name('automovel.edit'); //Formulário para editar produto
Route::get('automoveis/{id}', 'AutomovelController@show')->name('automovel.show'); //Detalhes do produto
// Route::get('produtos', 'ProductController@index')->name('products.index'); //Lista os produtos