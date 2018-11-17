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

Route::get('/dashboard', ['uses' => 'DashboardController@dashboard']);

Route::get('/', ['uses' => 'DashboardController@dashboard']);

Route::get('/partidos', ['uses' => 'PartidoController@listarPartidos'])
        ->name('listar.partidos');

Route::get('/parlamentares', ['uses' => 'ParlamentarController@listarParlamentares'])
        ->name('listar.parlamentares');

Route::get('/estados', ['uses' => 'EstadoController@listarEstados'])
        ->name('listar.estados');