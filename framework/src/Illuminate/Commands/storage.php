<?php

namespace Illuminate\Commands;

use Illuminate\Filesystem\Filesystem;

class Storage {

	public function __construct($method) {
		call_user_func([$this, $method]);
	}

	private static function link() {
		Filesystem::checkForFile(Filesystem::assets('/storage'), 'Storage link');

		echo "The storage link was created in the client/assets\n";
		symlink(Filesystem::storage('/'), Filesystem::assets('/storage'));
	}
}
