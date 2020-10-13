<?php

	require_once 'vendor/autoload.php';

	include 'framework/src/lib.php';
	include 'routes/web.php';

	$action = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
	$params = $_REQUEST;
	dispatch($action, $params);
