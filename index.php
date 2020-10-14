<?php

	require_once 'vendor/autoload.php';

	include 'framework/src/lib.php';

	$url = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
	$params = $_REQUEST;

	$route = getRoute($url);
	dispatch($route, $params);
