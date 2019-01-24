<?php

namespace VMdevelopment\MyFatoorah;

use Illuminate\Support\Facades\Config;
use VMdevelopment\MyFatoorah\Services\Auth;
use VMdevelopment\MyFatoorah\Services\CreateApiInvoiceIso;
use VMdevelopment\MyFatoorah\Services\FindApiInvoice;

class Myfatoorah
{

	public function requestAccessToken()
	{
		$auth = new Auth();

		return $auth->make();
	}


	public function createApiInvoiceIso()
	{
		return new CreateApiInvoiceIso();
	}


	public function findInvoice( $id )
	{
		$invoice = new FindApiInvoice( $id );

		return $invoice->make();
	}


	public function setAccessToken( array $token )
	{
		Config::set( 'myfatoorah.auth.token', $token );
	}
}