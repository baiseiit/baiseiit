<?php

	use Illuminate\Http\Request;

	Route::get('/test/@id', function($request) {
		Response::json([
			'get' => true
		], 200);
	});

	Route::get('/test/@id/host', function($request) {
		Response::json([
			'post' => $request->params['id']
		], 200);
	});
