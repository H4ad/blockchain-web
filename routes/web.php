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
Route::get('/', 'HomeController@index');
Route::post('/', 'HomeController@store');

/**
 * Rotas de autenticação
 */
Auth::routes();

Route::middleware('auth')->group(function () {
	Route::get('/inicio', 'ManagementController@management')->name('inicio');
	Route::get('/perfil', 'ManagementController@management')->name('perfil');
	Route::get('/transacoes', 'ManagementController@management')->name('transacoes');
	Route::get('/carteira', 'ManagementController@management')->name('carteira');

	Route::middleware('role:canteen')->group(function () {
		Route::prefix('/cantina')->group(function () {
			Route::get('/', 'ManagementController@management')->name('cantina');
			Route::get('trocar', 'ManagementController@management')->name('trocar');
			Route::get('vender', 'ManagementController@management')->name('vender');
			Route::get('estornar', 'ManagementController@management')->name('estornar');
			Route::get('qualidade', 'ManagementController@management')->name('qualidade');
		});

		Route::prefix('/produtos')->group(function () {
			Route::get('adicionar', 'ManagementController@management')->name('produtos.adicionar');
			Route::get('listar', 'ManagementController@management')->name('produtos.listar');
		});
	});

	Route::middleware('role:student')->group(function () {
		Route::prefix('/cantina')->group(function () {
			Route::get('comprar', 'ManagementController@management')->name('comprar');
		});
	});
});