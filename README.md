#Baiseiit Framework

![](https://raw.githubusercontent.com/baiseiit/baiseiit/master/storage/favicon.png)

Baiseiit is a PHP framework based on mvc. Baiseiit contains many useful features and helps web developers create applications faster.

[TOC]

#Install

1. Install Composer (https://getcomposer.org)

2. Install the package via composer:

```bash
composer create-project --prefer-dist baiseiit/baiseiit blog
```
Open config/app.php file and establish a database connection:

```php
	define('DB_HOST', '127.0.0.1');
	define('DB_USER', 'root');
	define('DB_PASS', '');
	define('DB_NAME', 'baiseiit');
```

Start the server
```bash
php artisan run
```

#Documentation

##Route

There are two types of routing: web and api. Use the web if your app doesn't have the integration API, otherwise use the api.

###Web

```php
	route('/', function($request) {
		(new HomeController)->example($request);
	});
```

###Api
```php
	route('/', function($request) {
		Response::json(['success' => true], 200);
	});
```

##Controller

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

##Model
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

##View
Creates a view in the client/Views directory
```bash
php artisan create View home
```

We use the Smarty template for views. See the Smarty documentation (https://www.smarty.net/documentation)

```html
<h1>{$title}</h1
```

##ORM
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
