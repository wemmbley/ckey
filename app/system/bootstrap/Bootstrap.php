<?php

namespace App\System\Bootstrap;

use App\view\View;
use Exception;

/**
 * Class Bootstrap
 * @package App\System\Bootstrap
 */
class Bootstrap {

	/**
	 * Building routes and calling controllers
	 *
	 * @throws Exception
	 */
	public function init() {
		$urlParams = URL::parse();

		foreach (Routes::get() as $url => $controllerName) {
			if($url === $urlParams['page']) {
				$controller = new Controller();

				if(!$controller->isControllerExists($controllerName))
					throw new Exception('Controller ' . $controllerName . ' not exists on server.');

				$controller->callController($controllerName);
				$controllerCalled = true;
			}
		}

		if(!isset($controllerCalled))
			$this->send404();
	}

	/**
	 * Send 404 Not Found message
	 * @throws Exception
	 */
	private function send404() {
		View::render('404');
		exit;
	}

}