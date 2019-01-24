<?php
/**
 * Created by PhpStorm.
 * User: Vanand Mkrtchyan
 * Date: 24-Jan-19
 * Time: 2:08 PM
 */

namespace VMdevelopment\MyFatoorah\Support\Response;

use VMdevelopment\MyFatoorah\Support\BasicData;

class Invoice
{
	protected $parameters = [];


	private function __construct()
	{
		$this->parameters = new BasicData( $this->parameters );
	}


	public static function hydrate( array $data )
	{
		$instance = new static();
		foreach ( $data as $key => $value )
			$instance->parameters->set( $key, $value );

		return $instance;
	}


	public function isPaid()
	{
		return $this->parameters->get( "TransactionStatus" ) == 2;
	}


	public function toJson()
	{
		return json_encode( $this->toArray() );
	}


	public function toArray()
	{
		return $this->parameters->all();
	}
}