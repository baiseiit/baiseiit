<?php

namespace Illuminate\Commands;

class Run {

	private function __construct() {}

	public static function run() {
		$url = ARTISAN_SERVER_HOST . ":" . ARTISAN_SERVER_PORT;
		echo "Server started on $url\n";
		shell_exec("php -S " . $url);
	}
}
