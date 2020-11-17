<?php

class TestMiddleware extends Middleware {

  public static function handle($request, \Closure $next) {
    return $next($request);
  }
}
