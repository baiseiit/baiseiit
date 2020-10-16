<?php
	const dir = 'framework/src/';

	includeFiles("config/");
	includeFiles(dir . "Contracts/");
	includeFiles(dir . "Parents/");
	includeFiles(dir . "Illuminate/");
	includeFiles(MODELS_PATH);
	includeFiles(CONTROLLERS_PATH);

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
?>
