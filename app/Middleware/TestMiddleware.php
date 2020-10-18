<?php

class TestMiddleware extends Middleware {

  public static function handle($request, \Closure $next) {

    $id = $request->params['id'];

    if ($id > 10) {
      return self::redirect('home', [
        'title' => '404 error'
      ]);
    } else {
      return $next($request);
    }
  }
}
