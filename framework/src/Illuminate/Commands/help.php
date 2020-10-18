<?php

namespace Illuminate\Commands;

use Illuminate\Commands\Console\Console_Table;

class Help {

	private static $commands = [
		'php artisan create Controller <Name>' => 'Generate a controller',
		'php artisan create Model <Name>' => 'Generate a model',
		'php artisan create View <Name>' => 'Generate a view',
		'php artisan create Middleware <Name>' => 'Generate a middleware',
		'php artisan run' => 'Run the server',
		'php artisan storage link' => 'Create the symbolic link'
	];

	private function __construct() {}

	public static function help() {
		echo "\n";

		$table = new Console_Table();
		$table->setHeaders(['Command', 'Description']);

		foreach (self::$commands as $key => $value) {
			$table->addRow([$key, $value]);
		}

		echo $table->getTable();
	}
}
