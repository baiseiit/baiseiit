<?php 
	const vendor = 'vendor/baiseiit/src/';

	require('vendor/smarty/libs/Smarty.class.php');
	include 'vendor/smarty/connection.php';

	include 'config/config.php';

	includeFiles(vendor . "Contracts/");	
	includeFiles(vendor . "Parents/");
	includeFiles(vendor . "Illuminate/");
	includeFiles('app/Models/');
	includeFiles('app/Controllers/');

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

		    $files[] = $file->getPathname(); 
		}

		return $files;
	}	
?>