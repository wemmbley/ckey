<?php

namespace App\Controller;

use App\System\Interfaces\Controller;
use App\view\View;

class HomeController implements Controller {

	public static function init() {
		View::render('index');
	}

}