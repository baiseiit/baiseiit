<?php

use Illuminate\Http\Route\Template;
use Illuminate\Http\Request;

class Route {

	private static $routes = [];

	private const GET = 'GET';
	private const POST = 'POST';
	private const PUT = 'PUT';
	private const DELETE = 'DELETE';
	private const PATCH = 'PATCH';

	private function __construct() {}

	public static function get($url, Closure $callback) {
		self::create(self::GET, $url, $callback);
	}

	public static function post($url, Closure $callback) {
		self::create(self::POST, $url, $callback);
	}

	public static function put($url, Closure $callback) {
		self::create(self::PUT, $url, $callback);
	}

	public static function delete($url, Closure $callback) {
		self::create(self::DELETE, $url, $callback);
	}

	public static function patch($url, Closure $callback) {
		self::create(self::PATCH, $url, $callback);
	}

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

			echo call_user_func($route->callback, $request);
		} else {
			http_response_code(404);
		}
	}

	private function create($method, $url, Closure $callback) {
		$url = self::trimUrl($url);

		foreach (self::$routes as $key => $route) {
			if ($url === $route->url) {
				if ($method == $route->method) {
					die('The route Url must be unique');
				}
			}
		}

		$route = new Template();
		$route->method = $method;
		$route->url = $url;
		$route->callback = $callback;

		self::$routes[] = $route;
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
						if ($routeResources[$key][0] != '@') {
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
			include 'routes/api.php';
			return substr($url, 5, strlen($url));
		} else {
			include 'routes/web.php';
			return $url;
		}
	}
}
