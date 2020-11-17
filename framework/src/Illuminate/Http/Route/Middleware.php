<?php

namespace Illuminate\Http\Route;

class Middleware {

	private $callback;
	private $middleware;

	public function __construct($callback) {
		$this->callback = $callback;
	}

	public function middleware(String $middleware = null) {
		$this->middleware = $middleware;
	}

	public function check($request) {
		if (!isset($this->middleware)) {
			call_user_func($this->callback, $request);
			return;
		}

		$this->middleware::handle($request, $this->callback);
	}
}
