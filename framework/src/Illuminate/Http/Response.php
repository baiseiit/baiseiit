<?php

class Response {
  public static function json($data, int $code) {

    header("Access-Control-Allow-Origin: " . ALLOW_ORIGIN);
    header("Access-Control-Allow-Methods: " . ALLOW_METHODS);
    header("Access-Control-Allow-Headers: " . ALLOW_HEADERS);
    header("Access-Control-Max-Age: " . MAX_AGE);
    header("Content-Type: application/json; charset=UTF-8");

    echo json_encode($data);
    http_response_code($code);
  }
}
