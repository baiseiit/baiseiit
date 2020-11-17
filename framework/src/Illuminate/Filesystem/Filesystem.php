<?php

namespace Illuminate\Filesystem;

use Exceptions\AlredyDefinedException;

final class Filesystem {

  private function __construct() {}

  public static function checkForFile($path, $name) {
    if (file_exists($path)) {
			throw new AlredyDefinedException("The {$name} has already been created.");
			exit();
		}
  }

  public static function assets($url) {
    $url = trim($url, '/');
    return __APP_DIR__ . "/client/assets/{$url}";
  }

  public static function storage($url) {
    $url = trim($url, '/');
    return __APP_DIR__ . "/storage/{$url}";
  }
}
