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

Route::get('automoveis/create', 'AutomovelController@create')->name('automovel.create'); //Formulário para cadastrar o automovel
Route::post('automoveis', 'AutomovelController@store')->name('automovel.store'); //Armazenar o automovel
// Route::delete('automovels/{id}', 'ProductController@destroy')->name('products.destroy'); //Deleta automovel
Route::put('automoveis/{id}/update', 'AutomovelController@update')->name('automovel.update'); //Altera o automovel
Route::get('automoveis/{id}/edit', 'AutomovelController@edit')->name('automovel.edit'); //Formulário para editar automovel
Route::get('automoveis/show/{id}', 'AutomovelController@show')->name('automovel.show'); //Detalhes do automovel
// Route::get('automovels', 'ProductController@index')->name('products.index'); //Listar os automoveis
Route::any('automoveis/search', 'AutomovelController@search')->name('automovel.search');

### Acesso restrito ###
// Route::middleware([])->group(function(){ //Tudo que tiver middleware só será executado se o usuário tiver logado. //caso houver auth no array ele vai restringir o acesso.
//     Route::prefix('admin')->group(function(){ //todas as rotas vão ficar com /admin/...
//         Route::name('admin')->group(function(){ //todos os names ficam com admin
//             //Route::get('usuarios', function(){
//             //    return "Página de usuários";
//             //})->name('admin-usuarios');
//             Route::get('dashboard', 'admin\TesteController@dashboard')->name('dashboard');  //rota: admin/dashboard | @ chama a função testar | name: admin.dashboard 
//             Route::get('financeiro', 'admin\TesteController@financeiro')->name('financeiro');
//             Route::get('usuarios', 'admin\TesteController@usuarios')->name('usuarios');            
//             Route::get('/', function(){ //Redirecionar página para admin/dashboard ao entrar em /admin
//                 return redirect()->route('admin.dashboard'); //Na função route é informado o name da rota.
//             })->name('home');
//         });        
//     });       
// });

// Route::get('/login', function(){
//     return view('login');
// });

Route::get('/login', 'UserController@login')->name('login.page');
Route::post('/login/auth', 'UserController@auth')->name('auth.user');