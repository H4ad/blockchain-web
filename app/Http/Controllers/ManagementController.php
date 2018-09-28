<?php namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ManagementController extends Controller
{
	/**
	 * Retorna a view com a página de início.
	 *
	 * @return \Illuminate\Http\Response
	 */
    public function management()
    {
		return view('management.home');
    }

	/**
	 * Retorna a view com as transações realizadas.
	 *
	 * @return \Illuminate\Http\Response
	 */
    public function transactions()
    {
    	return view('management.transactions');
    }

    /**
	 * Retorna a view com as informações do perfil
	 *
	 * @return \Illuminate\Http\Response
	 */
    public function profile()
    {
    	return view('management.profile');
    }
}
