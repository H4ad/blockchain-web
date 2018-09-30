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

/**
 * Rotas da página de início
 */
Route::get('/', 'HomeController@index')->name('homepage');
Route::get('/sobre', 'HomeController@about')->name('sobre');
Route::get('/contato', 'HomeController@contact')->name('contato');

Route::post('/', 'HomeController@store');

/**
 * Rotas de autenticação
 */
Auth::routes();

Route::middleware('auth')->group(function () {
	Route::get('/inicio', 'ManagementController@management')->name('inicio');
	Route::get('/perfil', 'ManagementController@profile')->name('perfil');
	Route::get('/transacoes', 'ManagementController@transactions')->name('transacoes');
	Route::post('/blockchain/{participant_id}', 'ManagementController@save_blockchain');
	Route::get('/blockchain', 'ManagementController@blockchain')->name('blockchain');

	Route::middleware('role:canteen')->group(function () {
		Route::prefix('/cantina')->group(function () {
			Route::get('/', 'ManagementController@management')->name('cantina');
			Route::get('trocar', 'CanteenController@exchange')->name('trocar');
			Route::get('estornar', 'CanteenController@to_reverse')->name('estornar');
			Route::get('qualidade', 'CanteenController@quality')->name('qualidade');
		});

		Route::prefix('/produtos')->group(function () {
			Route::get('adicionar', 'CanteenController@add')->name('produtos.adicionar');
			Route::get('listar', 'CanteenController@list')->name('produtos.listar');
			Route::post('atualizar', 'CanteenController@list')->name('produtos.atualizar');
		});
	});

	Route::middleware('role:student')->group(function () {
		Route::prefix('/cantina')->group(function () {
			Route::get('comprar', 'CanteenController@buy')->name('comprar');
		});
	});
});