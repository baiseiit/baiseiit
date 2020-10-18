<?php
	define('__FRAMEWORK_DIR__', __APP_DIR__ . '/framework/src');

	includeFiles(__APP_DIR__ . "/config/");
	includeFiles(__FRAMEWORK_DIR__ . "/Contracts");
	includeFiles(__FRAMEWORK_DIR__ . "/Parents");
	includeFiles(__FRAMEWORK_DIR__ . "/Exceptions");
	includeFiles(__FRAMEWORK_DIR__ . "/Illuminate");
	includeFiles(__APP_DIR__ . "/app/Middleware");
	includeFiles(__APP_DIR__  . '/' . trim(MODELS_PATH, '/'));
	includeFiles(__APP_DIR__  . '/' . trim(CONTROLLERS_PATH, '/'));

	function includeFiles($dir) {
		$files = fetchFiles($dir);

		foreach ($files as $key => $file) {
			include $file;
		}
	}

	function fetchFiles($dir) {
		$rii = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($dir));
		$files = [];

		foreach ($rii as $file) {
		    if ($file->isDir()){
		        continue;
		    }

				if ($file->getExtension() === 'php') {
					$files[] = $file->getPathname();
				}
		}

		return $files;
	}
