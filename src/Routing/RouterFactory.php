<?php declare(strict_types=1);

/**
 * @copyright Martin Procházka (c) 2020
 * @license   MIT License
 */

namespace App\Routing;

use Nette\Application\Routers\Route;
use Nette\Application\Routers\RouteList;
use Nette\StaticClass;

final class RouterFactory
{
	use StaticClass;


	/**
	 * @return RouteList
	 */
	public static function createRouter(): RouteList
	{
        $router = new RouteList;
        $router[] = static::getAdminModule();
        $router[] = static::getWebModule();
        $router[] = static::getRootModule();

		return $router;
	}


	/**
	 * @return RouteList
	 */
	private static function getRootModule(): RouteList
	{
        $router = new RouteList;
        $router[] = new Route('<presenter>/<action>[/<id>]', 'Error:default');

		return $router;
	}


	/**
	 * @return RouteList
	 */
	private static function getAdminModule(): RouteList
	{
        $router = new RouteList('Admin');
		$router->addRoute('[<locale [a-z]{2}>/]admin/<presenter>/<action>[/<id>]', 'Home:default');

		return $router;
	}


	/**
	 * @return RouteList
	 */
	private static function getWebModule(): RouteList
	{
        $router = new RouteList('Web');
		$router->addRoute('[<locale [a-z]{2}>/]changelog', 'Home:changelog');
		$router->addRoute('[<locale [a-z]{2}>/]<presenter>/<action>[/<id>]', 'Home:default');

		return $router;
	}
}
