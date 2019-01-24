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

### Requesting `AccessToken`
```php
public function auth(  )
{
	try{
	
		$token = MyFatoorah::requestAccessToken();
		
	} catch( \Exception $exception ){
		// your handling of request failure
	}
	$token->isExpired() // check if token is expired
	$token->getToken()  // get token
}
```
### Creating ApiInvoice(make payment)
```php
public function pay()
{
	try{

		$payment = MyFatoorah::createApiInvoiceIso();

		$payment->setCustomerName( "John Doe" );

		$payment->setDisplayCurrencyIsoAlpha( "KWD" );

		$payment->setCountryCodeId( 1 );

		$payment->setCallBackUrl( "http://example.com/success" );

		$payment->setErrorUrl( "http://example.com/error" );

		$payment->addProduct( "test product", 10, 5 );

		$payment->make();
		
	} catch( \Exception $exception ){
		// your handling of request failure
	}
    
    	$payment->isSuccess() // check if MyFatoorah has successfully handled request.
}
```
### Find ApiInvoice `AccessToken`
```php
public function check( $id )
{
	try{
	
		 $invoice = MyFatoorah::findInvoice( $id );
		 
	 } catch( \Exception $exception ){
		// your handling of request failure
	}
	$invoice->isPaid(); // check if invoice is paid
	$invoice->isUnpaid(); // check if invoice is unpaid
	$invoice->isFailed(); // check if invoice is failed
}
```
Available functions for found invoices
```
getInvoiceId()
getInvoiceReference()
getCreatedDate()
getExpireDate()
getInvoiceValue()
getComments()
getCustomerName()
getCustomerMobile()
getCustomerEmail()
getTransactionDate()
getPaymentGateway()
getReferenceId()
getTrackId()
getTransactionId()
getPaymentId()
getAuthorizationId()
getOrderId()
getInvoiceItems()
getTransactionStatus()
getError()
getPaidCurrency()
getPaidCurrencyValue()
getTransationValue()
getCustomerServiceCharge()
getDueValue()
getCurrency()
getApiCustomFileds()
getInvoiceDisplayValue()
```
 You are able also set access token in run-time
```php
public function check( $id )
{
	try{
		MyFatoorah::setAccessToken([
			"access_token" => "your token here",
			".expires" => "Tue, 21 Jan 2020 12:02:10 GMT",
		]);
		
		// your code goes here...
		
	 } catch( \Exception $exception ){
		// your handling of request failure
	}
}
```
