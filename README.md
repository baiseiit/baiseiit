# Baiseiit Framework

![](https://raw.githubusercontent.com/baiseiit/baiseiit/master/storage/favicon.png)

Baiseiit is a PHP framework based on mvc. Baiseiit contains many useful features and helps web developers create applications faster. Unlike other frameworks, you can directly change the framework code without losing it. Source code in the framework directory.

> The minimum PHP version must be 7.0.10

# Install

1. Install Composer (https://getcomposer.org)

2. Install the package via composer:

```bash
composer create-project --prefer-dist baiseiit/baiseiit blog
```
Open config/app.php file and establish a database connection. DB_CONNECTION only supports MySQL and Postgresql.

```php
  define('DB_CONNECTION', 'mysql');
	define('DB_HOST', '127.0.0.1');
	define('DB_USER', 'root');
	define('DB_PASS', '');
	define('DB_NAME', 'baiseiit');
```

Connecting a database to PostgreSQL:

```php
  define('DB_CONNECTION', 'pgsql');
```

Start the server
>Run the command on the command line in the project's base folder

```bash
  php artisan run
```

# Documentation

## Artisan

Artisan provides many useful commands and speeds up development time.

>Run the command on the command line in the project's base folder
```bash
    php artisan help
```

## Route

There are two types of routing: web (routes/web.php) and api (routes/api.php). Use the web if your app doesn't have the integration API, otherwise use the api.

### Web

```php
	Route::get('/', function($request) {
		(new HomeController)->example($request);
	})
```

### Api
```php
	Route::get('/', function($request) {
		Response::json([
			'success' => true
		], 200);
	});
```

---

#### Supported Http methods

```php
    Route::get('/', function($request) {});
    Route::post('/', function($request) {});
    Route::put('/', function($request) {});
    Route::delete('/', function($request) {});
    Route::patch('/', function($request) {});
```

#### Dynamic url

To get a dynamic url resource, we use $request->query[$name]. For example, we need to get a specific user.
- @ specifies that this is a dynamic resource
- $request->query['id'] returns the value @id

```php
    Route::get('/users/@id', function($request) {
		Response::json([
			'id' => $request->query['id']
		], 200);
	});
```

## Controller

Creates a controller in the app/Controllers directory
```bash
php artisan create Controller HomeController
```

Sets the variable to view
```bash
$this->view->set('title', 'Baiseiit');
```

Return view
```bash
$this->view->render('home');
```

## Model
Creates a model in the app/Models directory
```bash
php artisan create Model User
```

Set table
```php
class User extends Model {
	const TABLE = 'users';
}
```

## View
Creates a view in the client/Views directory
```bash
php artisan create View home
```

We use the Smarty template for views. See the Smarty documentation (https://www.smarty.net/documentation)

```html
<h1>{$title}</h1>
```

## ORM
We use the RedBean ORM. See the RedBean documentation (http://www.redbeanphp.com/api/classes/RedBeanPHP.R.html)

>We replaced the Redbean R class with Db

```php
use App\Models\User;

class HomeController extends Controller {

	public function example($request) {

		$users = Db::findAll(User::TABLE);

		$this->view->set('users', $users);
		$this->view->render('home');
	}
}
```

## Middleware
Creates a middleware in the app/Middleware directory
```bash
php artisan create Middleware TestMiddleware
```

The handle method automatically calls.

```php
class TestMiddleware extends Middleware {

  public static function handle($request, \Closure $next) {

    $id = $request->params['id'];

    if ($id > 10) {
      return self::redirect('home', [
        'title' => '404 error'
      ]);
    } else {
      return $next($request);
    }
  }
}
```

If the check fails you can redirect to error view.
```php
    return self::redirect($view, [$params]);
```

If everything is OK, you must return $next($request);

```php
    return $next($request);
```

Then register the middleware to route:
```php
	Route::get('/', function($request) {
		(new HomeController)->example($request);
	})->middleware(TestMiddleware::class);
```

## CORS
To configure cors go to the folder config/cors.php.
```php
    define('ALLOW_ORIGIN', '*');
    define('ALLOW_METHODS', '*');
    define('ALLOW_HEADERS', '*');
    define('MAX_AGE', 3600);
```

## Storage
You can save all files in the storage folder. The command below returns the path to store the file:
```php
    Filesystem::storage('/')
```

You can create a symbolic link of the Storage.
>If you are using Windows run this command as an administrator

```bash
    php artisan storage link
```

The storage shortcut is created in the client/assets directory.

## Assets

You can get all the client/assets files using the following command:
```bash
    Filesystem::assets('/')
```
