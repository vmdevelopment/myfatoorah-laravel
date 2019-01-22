<?php

namespace VMdevelopment\MyFatoorah\Services\Invoice;

use VMdevelopment\MyFatoorah\Services\ServiceAbstract;
use VMdevelopment\MyFatoorah\Traits\HasProducts;

class Invoice extends ServiceAbstract implements InvoiceInterface
{
	use HasProducts;

	/**
	 * @var string
	 */
	protected $id;


	/**
	 * Invoice constructor.
	 */
	public function __construct ()
	{
		$this->requestable = new CreateInvoiceIsoRequest();
		$this->requestable->setHeaders(
			[
				'Accept'       => 'application/json',
				'Content-Type' => 'application/json'
			]
		);
	}


	/**
	 * @param int $id
	 */
	public static function getById ( int $id )
	{
		// TODO: Implement getById() method.
	}


	/**
	 * @return mixed
	 */
	public function pay ()
	{
		$token = $this->getAccessToken();
		if ( is_null( $token ) || $token->isExpired() ) {
			$authorize = 1;
		}

		return $this->requestable->send( $this->populateRequestData() );
	}


	/**
	 * @return array
	 */
	public function populateRequestData ()
	{
		$data = $this->mapParamsToArray();
		$products = $this->mapProductsData();

		if ( count( $products ) ) {
			$data['InvoiceValue'] = $this->calculateProductsValue();
			$data['InvoiceItemsCreate'] = $products;
		}

		return $data;
	}
}