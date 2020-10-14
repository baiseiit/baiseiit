<?php

	route('/', function($request) {
		Response::json([
			'success' => true
		], 200);
	});
