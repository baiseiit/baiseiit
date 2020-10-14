<?php
	$routes = [];

	function route($action, Closure $callback) {
		global $routes;
		$action = trim($action, '/');
		$routes[$action] = $callback;
	}

	function dispatch($action, $params) {
		global $routes;
		$action = trim($action, '/');
		$callback = $routes[$action];

		if (isset($callback)) {
			echo call_user_func($callback, $params);
		} else {
			http_response_code(404);
		}
	}

	function getRoute($url) {
		$api = substr($url, 1, 3);

		if ($api === 'api') {
			include 'routes/api.php';
			return substr($url, 5, strlen($url));
		} else {
			include 'routes/web.php';
			return $url;
		}
	}
