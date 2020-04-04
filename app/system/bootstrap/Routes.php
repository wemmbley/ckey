<?php

namespace App\System\Bootstrap;

/**
 * Class Routes
 * @package App\system\bootstrap
 */
class Routes {

	/**
	 * @return array
	 */
	public static function get() {
		$routes = require ROOT . 'app/routes.php';

		return (array) $routes;
	}

}