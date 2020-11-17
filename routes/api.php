<?php

	use Illuminate\Http\Request;

	Route::get('/', function(Request $request) {
		Response::json([
			'success' => true
		], 200);
	});
