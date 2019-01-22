<?php
/**
 * Created by PhpStorm.
 * User: Vanand Mkrtchyan
 * Date: 22-Jan-19
 * Time: 6:32 PM
 */

namespace VMdevelopment\MyFatoorah\Traits;

trait HasProducts
{
	/**
	 * @var array
	 */
	protected $products = [];


	/**
	 * @param string      $name
	 * @param float       $price
	 * @param int         $quantity
	 * @param string|null $id
	 */
	public function addProduct ( string $name, float $price, int $quantity = 1, string $id = null )
	{
		$product = [
			"ProductName" => $name,
			"UnitPrice"   => $price,
			"Quantity"    => $quantity
		];
		$this->products[] = $product;
	}


	/**
	 * @return array
	 */
	public function mapProductsData ()
	{
		return $this->products;
	}


	/**
	 * @return float|int
	 */
	public function calculateProductsValue ()
	{
		$value = 0;
		if ( count( $this->products ) ) {
			foreach ( $this->products as $product ) {
				$value += $product['UnitPrice'] * $product['Quantity'];
			}
		}

		return $value;
	}
}