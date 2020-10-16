<?php

	Route::post('/', function($request) {
		(new HomeController)->example($request);
	});
