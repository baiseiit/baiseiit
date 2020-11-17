<?php

	Route::get('/', function($request) {
		(new HomeController)->example($request);
	})->middleware(TestMiddleware::class);
