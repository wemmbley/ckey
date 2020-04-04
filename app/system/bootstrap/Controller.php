<?php

namespace App\System\Bootstrap;

/**
 * Class Controller
 * @package App\system\bootstrap
 */
class Controller {

	/**
	 * @param $controllerName
	 */
	public function callController($controllerName) {
		$controllerName = '\App\Controller\\' . $controllerName . 'Controller';
		$controller = new $controllerName;
		$controller::init();
	}

	/**
	 * @param $controllerName
	 *
	 * @return bool
	 */
	public function isControllerExists($controllerName) {
		$defaultControllerUrl = ROOT . 'app/controller/' . $controllerName . 'Controller.php';

		if(!file_exists($defaultControllerUrl))
			return false;

		return true;
	}

}