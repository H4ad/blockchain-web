<?php namespace App\Http\Composers;

use Illuminate\Contracts\View\View;

/**
 * Faz um binding para a view de nav
 */
class NavComposer
{
	/**
	 * Adiciona novas informações a view.
	 *
	 * @param  View   $view
	 * @return void
	 */
	public function compose(View $view)
	{
		$unreadNotifications = \Auth::user()->getMenuNotifications();
		$numUnreadNotifications = count($unreadNotifications);

		$view->with(compact('unreadNotifications', 'numUnreadNotifications'));
	}
}