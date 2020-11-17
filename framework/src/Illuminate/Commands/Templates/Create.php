<?php

namespace Illuminate\Commands\Templates;

use Contracts\Commands\Templatable;

class Create implements Templatable {
	public static function controller($name) {
		return
"<?php

class $name extends Controller {
	//
}";
	}

	public static function view($name) {
		return
"<!DOCTYPE html>
<html>
<head>
	<title>$name</title>
</head>
<body>

</body>
</html>";
	}

	public static function model($name) {
		return
"<?php

namespace App\Models;

class $name extends Model {
	const TABLE = '" . $name . "';
}";
	}

	public static function middleware($name) {
		return
"<?php

class $name extends Middleware {
	public static function handle(\$request, \Closure \$next) {
		return \$next(\$request);
	}
}";
	}
}
