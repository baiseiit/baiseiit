<?php

	route('/', function($request) {
		(new HomeController)->example($request);
	});
