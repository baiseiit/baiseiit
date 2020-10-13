<?php

namespace Illuminate\Commands;

class Help {

	private static $commands = [
		'php artisan create Controller <Name>' => 'Generate a controller',
		'php artisan create Model <Name>' => 'Generate a model',
		'php artisan create View <Name>' => 'Generate a view',
		'php artisan run' => 'Run the server'
	];

	private function __construct() {}

	public static function help() {
		echo "\n";
		
		foreach (self::$commands as $key => $value) {
			echo "$key - $value\n";
		}
	}
}