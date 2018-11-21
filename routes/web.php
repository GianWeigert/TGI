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
Route::get('/', ['uses' => 'DashboardController@dashboard'])
        ->name('dashboard');

Route::get('/partidos', ['uses' => 'PartidoController@listarPartidos'])
        ->name('listar.partidos');

Route::get('/perfil-partido', ['uses' => 'PartidoController@perfilPartido'])
        ->name('perfil.partido');

Route::get('/parlamentares', ['uses' => 'ParlamentarController@listarParlamentares'])
        ->name('listar.parlamentares');

Route::get('/perfil-parlamentar/{id}', ['uses' => 'ParlamentarController@perfilParlamentar'])
        ->name('perfil.parlamentar');

Route::get('/estatistica-parlamentar', ['uses' => 'ParlamentarController@estatisticaParlamentar'])
        ->name('estatistica.parlamentar');

Route::get('/estados', ['uses' => 'EstadoController@listarEstados'])
        ->name('listar.estados');

Route::get('/fornecedores', ['uses' => 'FornecedorController@listarFornecedores'])
        ->name('listar.fornecedores');