<?php

namespace Illuminate\Commands;

use Illuminate\Commands\Templates\Create as Template;

use Illuminate\Filesystem\Filesystem;

use Exceptions\AlredyDefinedException;
use Exceptions\NotFoundException;

class Create {

	private static $middlewarePath = 'app/Middleware';

	public function __construct($method, $name) {
		if(method_exists( $this, $method ) && isset($name)) {
			call_user_func([$this, $method], $name);
		} else {
			throw new NotFoundException("{$method} command not found.");
		}
	}

	private function controller($name) {
		$path = __APP_DIR__  . '/' . trim(CONTROLLERS_PATH, '/') . "/${name}.php";

		Filesystem::checkForFile($path, $name);

		file_put_contents($path, Template::controller($name));
		echo "The Controller was created successfully!\n";
	}

	private function view($name) {
		$path = __APP_DIR__  . '/' . trim(VIEWS_PATH, '/') . "/${name}.tpl";

		Filesystem::checkForFile($path, $name);

		file_put_contents($path, Template::view($name));
		echo "The View was created successfully!\n";
	}

	private function model($name) {
		$path = __APP_DIR__  . '/' . trim(MODELS_PATH, '/') . "/${name}.php";

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
