<?php
	/** Absolute path to config. */
	require __DIR__ . DIRECTORY_SEPARATOR . "config.php";

	require_once ABSPATH . INC  . DIRECTORY_SEPARATOR . "functions.php";

	spl_autoload_register(function($class) {
		$filepath = str_replace(
			'\\', // Replace all namespace separators...
			'/',  // ...with their file system equivalents
			loadFile(__DIR__ . "/classes", "{$class}")
		);
			
		if (is_file($filepath))
			require_once $filepath;
	});
		
	$validate = new Validation;
