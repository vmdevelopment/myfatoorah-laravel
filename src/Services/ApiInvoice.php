<?php

namespace VMdevelopment\MyFatoorah\Services;

use VMdevelopment\MyFatoorah\Support\Response\Invoice;

class ApiInvoice extends AbstractService
{
	protected $endpoint = "ApiInvoices/CreateInvoiceIso";

	protected static $instance = null;

	protected $requiresAccessToken = true;

	private $products = [];


	public function __construct()
	{
		parent::__construct();
		self::$instance = $this;
	}


	function make()
	{
		if ( $this->requestData->has( 'InvoiceId' ) && $this->requestData->get( 'InvoiceId' ) )
			return $this->instance->findById( $this->requestData->get( 'InvoiceId' ) );

		return $this->create();
	}


	/**
	 * @param $id
	 *
	 * @return \VMdevelopment\MyFatoorah\Support\Response\Invoice
	 */
	public static function findById( $id )
	{
		$invoice = self::$instance ?: new static();
		$data = $invoice->client->get(
			$invoice->getRequestUrl( "ApiInvoices/Transaction/" . $id ), [
				"headers" => $invoice->headers->all(),
				"json"    => $invoice->requestData->all(),
			]
		);

		return Invoice::hydrate( $data );
	}


	/**
	 * @return \VMdevelopment\MyFatoorah\Support\Response\Invoice
	 */
	protected function create()
	{
		$data = $this->client->post(
			$this->getRequestUrl(), [
				"headers" => $this->headers->all(),
				"json"    => $this->requestData->all(),
			]
		);

		return Invoice::hydrate( $data );
	}


	public function setInvoiceValue( $value )
	{
		if ( is_array( $this->products ) && count( $this->products ) )
			throw new \Exception( "Can not change value since there are products" );

		$this->requestData->set( "InvoiceValue", $value );
	}


	public function addProduct( string $name, float $price, int $quantity = 1, $id = null )
	{
		$this->products[] = [
			"ProductName" => $name,
			"ProductId"   => $id,
			"UnitPrice"   => $price,
			"Quantity"    => $quantity,
		];
		$this->requestData->set( 'InvoiceItemsCreate', $this->products );
		$this->calculateInvoiceTotal();
	}


	private function calculateInvoiceTotal()
	{
		$value = 0;
		foreach ( $this->products as $product )
			$value += $product["UnitPrice"] * $product["Quantity"];

		$this->requestData->set( "InvoiceValue", $value );
	}


	public function setCustomerName( $value )
	{
		$this->requestData->set( "CustomerName", $value );
	}


	public function setCustomerBlock( $value )
	{
		$this->requestData->set( "CustomerBlock", $value );
	}


	public function setCustomerStreet( $value )
	{
		$this->requestData->set( "CustomerStreet", $value );
	}


	public function setCustomerHouseBuildingNo( $value )
	{
		$this->requestData->set( "CustomerHouseBuildingNo", $value );
	}


	public function setCustomerCivilId( $value )
	{
		$this->requestData->set( "CustomerCivilId", $value );
	}


	public function setCustomerAddress( $value )
	{
		$this->requestData->set( "CustomerAddress", $value );
	}


	public function setCustomerReference( $value )
	{
		$this->requestData->set( "CustomerReference", $value );
	}


	public function setDisplayCurrencyIsoAlpha( $value )
	{
		$this->requestData->set( "DisplayCurrencyIsoAlpha", $value );
	}


	public function setCountryCodeId( $value )
	{
		$this->requestData->set( "CountryCodeId", $value );
	}


	public function setCustomerMobile( $value )
	{
		$this->requestData->set( "CustomerMobile", $value );
	}


	public function setCustomerEmail( $value )
	{
		$this->requestData->set( "CustomerEmail", $value );
	}


	public function setSendInvoiceOption( $value )
	{
		$this->requestData->set( "SendInvoiceOption", $value );
	}


	public function setProductId( $value )
	{
		$this->requestData->set( "ProductId", $value );
	}


	public function setProductName( $value )
	{
		$this->requestData->set( "ProductName", $value );
	}


	public function setQuantity( $value )
	{
		$this->requestData->set( "Quantity", $value );
	}


	public function setUnitPrice( $value )
	{
		$this->requestData->set( "UnitPrice", $value );
	}


	public function setCallBackUrl( $value )
	{
		$this->requestData->set( "CallBackUrl", $value );
	}


	public function setLanguage( $value )
	{
		$this->requestData->set( "Language", $value );
	}


	public function setExpireDate( $value )
	{
		$this->requestData->set( "ExpireDate", $value );
	}


	public function setApiCustomFileds( $value )
	{
		$this->requestData->set( "ApiCustomFileds", $value );
	}


	public function setErrorUrl( $value )
	{
		$this->requestData->set( "ErrorUrl", $value );
	}


	public function getInvoiceValue()
	{
		return $this->requestData->get( "InvoiceValue" );
	}


	public function getCustomerName()
	{
		return $this->requestData->get( "CustomerName" );
	}


	public function getCustomerBlock()
	{
		return $this->requestData->get( "CustomerBlock" );
	}


	public function getCustomerStreet()
	{
		return $this->requestData->get( "CustomerStreet" );
	}


	public function getCustomerHouseBuildingNo()
	{
		return $this->requestData->get( "CustomerHouseBuildingNo" );
	}


	public function getCustomerCivilId()
	{
		return $this->requestData->get( "CustomerCivilId" );
	}


	public function getCustomerAddress()
	{
		return $this->requestData->get( "CustomerAddress" );
	}


	public function getCustomerReference()
	{
		return $this->requestData->get( "CustomerReference" );
	}


	public function getDisplayCurrencyIsoAlpha()
	{
		return $this->requestData->get( "DisplayCurrencyIsoAlpha" );
	}


	public function getCountryCodeId()
	{
		return $this->requestData->get( "CountryCodeId" );
	}


	public function getCustomerMobile()
	{
		return $this->requestData->get( "CustomerMobile" );
	}


	public function getCustomerEmail()
	{
		return $this->requestData->get( "CustomerEmail" );
	}


	public function getSendInvoiceOption()
	{
		return $this->requestData->get( "SendInvoiceOption" );
	}


	public function getInvoiceItemsCreate()
	{
		return $this->requestData->get( "InvoiceItemsCreate" );
	}


	public function getProductId()
	{
		return $this->requestData->get( "ProductId" );
	}


	public function getProductName()
	{
		return $this->requestData->get( "ProductName" );
	}


	public function getQuantity()
	{
		return $this->requestData->get( "Quantity" );
	}


	public function getUnitPrice()
	{
		return $this->requestData->get( "UnitPrice" );
	}


	public function getCallBackUrl()
	{
		return $this->requestData->get( "CallBackUrl" );
	}


	public function getLanguage()
	{
		return $this->requestData->get( "Language" );
	}


	public function getExpireDate()
	{
		return $this->requestData->get( "ExpireDate" );
	}


	public function getApiCustomFileds()
	{
		return $this->requestData->get( "ApiCustomFileds" );
	}


	public function getErrorUrl()
	{
		return $this->requestData->get( "ErrorUrl" );
	}


	public function toArray()
	{
		return $this->requestData->all();
	}
}