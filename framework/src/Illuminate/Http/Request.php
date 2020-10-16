<?php

namespace Illuminate\Http;

class Request {
  public $method;
  public $path;
  public $query = [];
  public $params = [];
}
