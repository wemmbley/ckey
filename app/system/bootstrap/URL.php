<?php

namespace App\System\Bootstrap;

/**
 * Class Url
 * @package App\system\bootstrap
 */
class URL {

	/**
	 * @return array
	 */
	public static function parse() {
		$url['uri'] = ltrim( $_SERVER['REQUEST_URI'], '/');
		$url['params'] = explode('/', $url['uri']);
		$url['page'] = '/';

		if(isset($url['params'][0]) && $url['params'][0] === 'page')
			if(isset($url['params'][1]))
				$url['page'] = htmlspecialchars($url['params'][1]);

		return (array) $url;
	}

}