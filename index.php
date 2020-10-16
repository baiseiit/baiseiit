<?php

	require_once 'vendor/autoload.php';

	include 'framework/src/lib.php';

	Route::dispatch($_SERVER, $_REQUEST);
