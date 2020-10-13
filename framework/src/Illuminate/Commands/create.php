<?php

namespace Illuminate\Commands;

use Illuminate\Commands\Templates\Create as Template;

class Create {

	public function __construct($method, $name) {
		call_user_func([$this, $method], $name);
	}

	private function controller($name) {
		$path = CONTROLLERS_PATH . $name . '.php';

		if (file_exists($path)) {
			echo "The controller has already been created!\n";
			exit();
		}

		file_put_contents($path, Template::controller($name));
		echo "The controller was created successfully!\n";
	}

	private function view($name) {
		$path = VIEWS_PATH . $name . '.tpl';

		if (file_exists($path)) {
			echo "The View has already been created!\n";
			exit();
		}

		file_put_contents($path, Template::view($name));
		echo "The View was created successfully!\n";
	}

	private function model($name) {
		$path = MODELS_PATH . $name . '.php';

		if (file_exists($path)) {
			echo "The Model has already been created!\n";
			exit();
		}

		file_put_contents($path, Template::model($name));
		echo "The Model was created successfully!\n";
	}
}
