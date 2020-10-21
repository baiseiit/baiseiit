<?php

namespace Illuminate\Commands;

use Illuminate\Commands\Templates\Create as Template;

use Illuminate\Filesystem\Filesystem;

use Exceptions\AlredyDefinedException;
use Exceptions\NotFoundException;

class Create {

	private static $middlewarePath = 'app/Middleware';
	private static $modelPath = 'app/Models';
	private static $controllerPath = 'app/Controllers';
	private static $viewPath = 'client/Views';

	public function __construct($method, $name) {
		if(method_exists( $this, $method ) && isset($name)) {
			call_user_func([$this, $method], $name);
		} else {
			throw new NotFoundException("{$method} command not found.");
		}
	}

	private function controller($name) {
		$path = __APP_DIR__  . '/' . trim(self::$controllerPath, '/') . "/${name}.php";

		Filesystem::checkForFile($path, $name);

		file_put_contents($path, Template::controller($name));
		echo "The Controller was created successfully!\n";
	}

	private function view($name) {
		$path = __APP_DIR__  . '/' . trim(self::$viewPath, '/') . "/${name}.tpl";

		Filesystem::checkForFile($path, $name);

		file_put_contents($path, Template::view($name));
		echo "The View was created successfully!\n";
	}

	private function model($name) {
		$path = __APP_DIR__  . '/' . trim(self::$modelPath, '/') . "/${name}.php";

		Filesystem::checkForFile($path, $name);

		file_put_contents($path, Template::model($name));
		echo "The Model was created successfully!\n";
	}

	private function middleware($name) {
		$path = __APP_DIR__  . '/' . trim(self::$middlewarePath, '/') . "/${name}.php";

		Filesystem::checkForFile($path, $name);

		file_put_contents($path, Template::middleware($name));
		echo "The Middleware was created successfully!\n";
	}
}
