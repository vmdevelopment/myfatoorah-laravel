<?php

namespace VMdevelopment\MyFatoorah\Response;

use VMdevelopment\MyFatoorah\Support\BasicData;

/**
 * @method string getInvoiceId()
 * @method string getInvoiceReference()
 * @method string getCreatedDate()
 * @method string getExpireDate()
 * @method string getInvoiceValue()
 * @method string getComments()
 * @method string getCustomerName()
 * @method string getCustomerMobile()
 * @method string getCustomerEmail()
 * @method string getTransactionDate()
 * @method string getPaymentGateway()
 * @method string getReferenceId()
 * @method string getTrackId()
 * @method string getTransactionId()
 * @method string getPaymentId()
 * @method string getAuthorizationId()
 * @method string getOrderId()
 * @method string getInvoiceItems()
 * @method string getTransactionStatus()
 * @method string getError()
 * @method string getPaidCurrency()
 * @method string getPaidCurrencyValue()
 * @method string getTransationValue()
 * @method string getCustomerServiceCharge()
 * @method string getDueValue()
 * @method string getCurrency()
 * @method string getApiCustomFileds()
 * @method string getInvoiceDisplayValue()
 */
class FindApiInvoice
{
	protected $data;


	public function __construct( $data = [] )
	{
		$this->data = new BasicData( $data );
	}


	public function isUnpaid()
	{
		return $this->getTransactionStatus() == 1;
	}


	public function isPaid()
	{
		return $this->getTransactionStatus() == 2;
	}


	public function isFailed()
	{
		return $this->getTransactionStatus() == 3;
	}


	public function __call( $name, $arguments )
	{
		if ( mb_substr( $name, 0, 3 ) == "get" ) {
			return $this->data->get( mb_substr( $name, 3 ) );
		}

		return null;
	}
}