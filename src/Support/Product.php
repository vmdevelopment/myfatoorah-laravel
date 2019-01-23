<?php
/**
 * Created by PhpStorm.
 * User: Vanand Mkrtchyan
 * Date: 23-Jan-19
 * Time: 5:55 PM
 */

namespace VMdevelopment\MyFatoorah\Support;

class Product
{
	public $ProductName;
	public $UnitPrice;
	public $Quantity;
	public $ProductId;


	public function __construct( string $name, float $price, int $quantity = 1, string $id = null )
	{
		$this->ProductName = $name;
		$this->UnitPrice = $price;
		$this->Quantity = $quantity;

		if ( $id )
			$this->ProductId = $id;
	}
}