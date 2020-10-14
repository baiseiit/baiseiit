<?php

class Response {
  public static function json($data, int $code) {
    echo json_encode($data);
    http_response_code($code);
  }
}
