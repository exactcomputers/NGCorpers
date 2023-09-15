<?php
	//error_reporting(0);
	//ini_set('dispaly_errors', 1);

	/** Domain's path to the webpdo directory or absolute path. */
	if ( !defined('ABSPATH') )
		define('ABSPATH', __DIR__ . '/');

	// start session if not started or set
	if( session_status() === PHP_SESSION_NONE )
		session_start();
	
	// Set the new timezone
	date_default_timezone_set('Africa/Lagos');

	// session token
	$accessToken = isset($_SESSION['accessToken']) ? $_SESSION['accessToken'] : "";
	$tokenPrefix = "Bearer " ;
	$headers = [
		'Content-Type: application/json',
		'Accept: application/json',
		'Authorization: '.$tokenPrefix . $accessToken		
	];

	// Constant @vars
	define('INC', 'includes');
	define('AUTH', './auth/');
	define('BASE_FILE', '/index.php');
	define('APP_URL', 'http://localhost/exact/ngcorpers/app/');
	define('API', 'http://localhost:5000/api/');
	
	define('HEADERS', $headers);