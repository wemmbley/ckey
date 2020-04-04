<?php
require_once 'vendor/autoload.php';

try {
	$boot = new \App\System\Bootstrap\Bootstrap();
	$boot->init();
} catch (PDOException | Exception $e) {
	die(
		'<b>' . $e->getFile() . '(' . $e->getLine() . '):</b> ' . $e->getMessage()
	);
}