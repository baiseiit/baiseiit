<?php

namespace Illuminate\Http\Route;

use Closure;

class Method {

  private const GET = 'GET';
  private const POST = 'POST';
  private const PUT = 'PUT';
  private const DELETE = 'DELETE';
  private const PATCH = 'PATCH';

  public static function get($url, Closure $callback) {
    return static::create(self::GET, $url, $callback);
  }

  public static function post($url, Closure $callback) {
    return static::create(self::POST, $url, $callback);
  }

  public static function put($url, Closure $callback) {
    return static::create(self::PUT, $url, $callback);
  }

  public static function delete($url, Closure $callback) {
    return static::create(self::DELETE, $url, $callback);
  }

  public static function patch($url, Closure $callback) {
    return static::create(self::PATCH, $url, $callback);
  }

}
