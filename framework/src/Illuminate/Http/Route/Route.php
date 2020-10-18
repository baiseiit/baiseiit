<?php

use Illuminate\Http\Route\Template;
use Illuminate\Http\Route\Middleware;
use Illuminate\Http\Request;
use Illuminate\Http\Route\Method;
use Exceptions\UniqueException;

class Route extends Method {

	private static $routes = [];

	private function __construct() {}

	public static function dispatch($server, $request) {

		$method = $server['REQUEST_METHOD'];
		$url = self::getRoute(parse_url($server['REQUEST_URI'], PHP_URL_PATH));
		$params = $request;

		$url = self::trimUrl($url);

		$response = self::compareRoute($method, $url);

		if ($response) {
			$route = $response['route'];

			$request = new Request();
			$request->method = $method;
			$request->path = $url;
			$request->query = $response['params'];
			$request->params = $params;

			$route->middleware->check($request);
		} else {
			http_response_code(404);
		}
	}

	public static function create($method, $url, Closure $callback) {
		$url = self::trimUrl($url);

		foreach (self::$routes as $key => $route) {
			if ($url === $route->url) {
				if ($method == $route->method) {
					throw new UniqueException("The route Url must be unique");
				}
			}
		}

		$route = new Template();
		$route->method = $method;
		$route->url = $url;
		$route->callback = $callback;
		$route->middleware = new Middleware($callback);

		self::$routes[] = $route;
		return $route->middleware;
	}

	private function compareRoute($method, $url) {
		foreach (self::$routes as $routeId => $route) {
			if ($method === $route->method) {
				$resources = self::splitUrl($url);
				$routeResources = self::splitUrl($route->url);

				if (count($resources) === count($routeResources)) {
					$isSame = true;
					$params = [];

					foreach ($resources as $key => $res) {
						if (substr($routeResources[$key], 0, 1) != "@") {
							if ($res !== $routeResources[$key]) {
								$isSame = false;
								break;
							}
						} else {
							$name = substr($routeResources[$key], 1, strlen($routeResources[$key]));
							$params[$name] = $res;
						}
					}

					if ($isSame) {
						$response['route'] = $route;
						$response['params'] = $params;

						return $response;
					}
				}
			}
		}

		return null;
	}

	private function splitUrl($url) {
		$resources = explode('/', $url);
		return $resources;
	}

	private static function trimUrl($url) {
		return trim($url, '/');
	}

	private static function getRoute($url) {
		$api = substr($url, 1, 3);

		if ($api === 'api') {
			include __APP_DIR__  . '/routes/api.php';
			return substr($url, 5, strlen($url));
		} else {
			include __APP_DIR__ . '/routes/web.php';
			return $url;
		}
	}
}
