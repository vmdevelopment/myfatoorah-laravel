# Laravel Package for Myfatoorah Payment Gateway REST API

Myfatoorah Payment Gateway for Laravel 5*

## Installation

Add `vmdevelopment/myfatoorah-laravel` to your `composer.json`.
```
"vmdevelopment/myfatoorah-laravel": "~1.0.*"
```

Run `composer update` to pull down the latest version of package.

OR simply run
```
composer require "vmdevelopment/myfatoorah-laravel"
```

Now open up `/config/app.php` and add the service provider to your `providers` array.
```php
'providers' => [
	VMdevelopment\MyFatoorah\MyFatoorahServiceProfider::class,
]
```

Now add the alias.
```php
'aliases' => [
	'MyFatoorah' => VMdevelopment\MyFatoorah\Facade\MyFatoorah::class,
]
```

## Configuration
To publish config run
```
php artisan vendor:publish --provider="VMdevelopment\MyFatoorah\MyFatoorahServiceProfider"
```
and modify the config file with your own information. File is located in `/config/myfatoorah.php`

you can use this environment variables in your `.env` file
```
MYFATOORAH_MODE=test
MYFATOORAH_USERNAME=username
MYFATOORAH_PASSWORD=secret
```

## Current version Functions

* `Myfatoorah::requestAccessToken()` - Authorizing with your `username` and `password` and returns `AccessToken`
* `Myfatoorah::createApiInvoiceIso()` - Creating an ApiInvoice
* `Myfatoorah::findInvoice($id)` - Finding an ApiInvoice by ID
* `Myfatoorah::setAccessToken($token)` - Setting Run time `AccessToken`

## Usage example

Requesting `AccessToken`
```php
public function auth(  )
	{
		$token = MyFatoorah::requestAccessToken();
    $token->isExpired() // check if token is expired
    $token->getToken()  // get token
	}
```
