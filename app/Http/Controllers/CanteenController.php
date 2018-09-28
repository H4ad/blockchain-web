<?php namespace App\Http\Controllers;

class CanteenController extends Controller
{
	/**
	 * Retorna a view de comprar um prduto
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function buy()
	{
		return view('management.product.buy');
	}

	/**
	 * Retorna view de trocar um produto
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function exchange()
	{
		return view('management.product.exchange');
	}

	/**
	 * Retorna view de estornar um produto
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function to_reverse()
	{
		return view('management.product.to_reverse');
	}

	/**
	 * Retorna view de qualidade de um produto
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function quality()
	{
		return view('management.product.quality');
	}

	/**
	 * Retorna view de adicionar um produto
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function add()
	{
		return view('management.product.add');
	}

	/**
	 * Retorna view de listar produtos
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function list()
	{
		return view('management.product.list');
	}
}
