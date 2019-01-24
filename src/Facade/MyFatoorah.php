<?php

namespace VMdevelopment\MyFatoorah\Facade;

use Illuminate\Support\Facades\Facade;

/**
 * @method static \VMdevelopment\MyFatoorah\Support\AccessToken requestAccessToken()
 * @method static \VMdevelopment\MyFatoorah\Services\CreateApiInvoiceIso createApiInvoiceIso()
 * @method static \VMdevelopment\MyFatoorah\Response\FindApiInvoice findInvoice()
 * @method static void setAccessToken( $token )
 *
 * @package VMdevelopment\MyFatoorah\Facade
 */
class MyFatoorah extends Facade
{
	/**
	 * Get the registered name of the component.
	 *
	 * @return string
	 */
	protected static function getFacadeAccessor() { return 'myfatoorah'; }
}