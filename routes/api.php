<?php

	use Illuminate\Http\Request;

	Route::get('/test/@id', function($request) {
		Response::json([
			'id' => $request->query['id']
		], 200);
	});
