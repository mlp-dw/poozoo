<?php
spl_autoload_register(function($className) {
	$file = dirname(__DIR__) . '/classes/' . $className . '.php';
	if (file_exists($file)) {
		include $file;
	}
});