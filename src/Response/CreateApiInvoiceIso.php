<?php
/**
 * Created by PhpStorm.
 * User: Vanand Mkrtchyan
 * Date: 24-Jan-19
 * Time: 7:55 PM
 */

namespace VMdevelopment\MyFatoorah\Response;

use VMdevelopment\MyFatoorah\Support\BasicData;

class CreateApiInvoiceIso
{
	protected $data;


	public function __construct( $data = [] )
	{
		$this->data = new BasicData( $data );
	}


	public function isSuccess()
	{
		return $this->data->get( 'IsSuccess' );
	}


	public function getMessage()
	{
		return $this->data->get( 'Message' );
	}


	public function getRedirectUrl()
	{
		return $this->data->get( 'RedirectUrl' );
	}


	public function getPaymentMethods()
	{
		return $this->data->get( 'PaymentMethods' );
	}


	/**
	 * @param $code
	 *
	 * @return array|null
	 */
	public function getPaymentMethodByCode( $code )
	{
		$index = array_search( $code, array_column( $this->getPaymentMethods(), 'PaymentMethodCode' ) );

		return $index === false ? null : $this->getPaymentMethods()[ $index ];
	}


	public function getApiCustomFileds()
	{
		return $this->data->get( 'ApiCustomFileds' );
	}


	public function getId()
	{
		return $this->data->get( 'Id' );
	}


	public function getFieldsErrors()
	{
		return $this->data->get( 'FieldsErrors' );
	}
}