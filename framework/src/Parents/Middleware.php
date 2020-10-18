<?php

use Views\View;

abstract class Middleware {

  public abstract static function handle($request, \Closure $next);

  public static function redirect($name, $data = []) {
    $view = new View();

    foreach ($data as $key => $value) {
      $view->set($key, $value);
    }

    $view->render($name);
    exit();
  }
}
