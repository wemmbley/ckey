<?php

namespace App\view;

/**
 * Class View
 * @package App\view
 */
class View {

	/**
	 * Render page with array of params
	 *
	 * @param $fileName
	 * @param array $params
	 *
	 * @throws \Exception
	 */
	public static function render($fileName, $params = []) {
		$filePath = ROOT . 'app/themes/' . THEME_NAME . '/' . $fileName . '.tpl';

		if(!file_exists($filePath))
			throw new \Exception('File ' . $fileName . 'not found.');

		ob_start();
		require $filePath;
		ob_get_flush();
	}

}