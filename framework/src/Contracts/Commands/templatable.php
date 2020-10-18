<?php

namespace Contracts\Commands;

interface Templatable {
	public static function controller($name);
	public static function view($name);
	public static function model($name);
	public static function middleware($name);
}
