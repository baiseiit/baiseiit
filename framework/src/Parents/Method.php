<?php

namespace Illuminate\Http\Route;

use Closure;

class Method {

  private static $get = 'GET';
  private static $post = 'POST';
  private static $put = 'PUT';
  private static $delete = 'DELETE';
  private static $patch = 'PATCH';

  public static function get($url, Closure $callback) {
    return static::create(self::$get, $url, $callback);
  }

  public static function post($url, Closure $callback) {
    return static::create(self::$post, $url, $callback);
  }

  public static function put($url, Closure $callback) {
    return static::create(self::$put, $url, $callback);
  }

  public static function delete($url, Closure $callback) {
    return static::create(self::$delete, $url, $callback);
  }

  public static function patch($url, Closure $callback) {
    return static::create(self::$patch, $url, $callback);
  }

}
