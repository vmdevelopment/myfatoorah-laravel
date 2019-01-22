<?php

namespace VMdevelopment\MyFatoorah\HttpClient;

/**
 * Interface HttpClientInterface
 *
 * @package VMdevelopment\MyFatoorah\HttpClient
 */
interface HttpClientInterface
{
	/**
	 * @param string $path
	 * @param        $parameters
	 *
	 * @return mixed
	 */
	public function get ( string $path, array $parameters = null );


	/**
	 * @param string $path
	 * @param        $parameters
	 *
	 * @return mixed
	 */
	public function post ( string $path, array $parameters = null );


	/**
	 * @param $response
	 *
	 * @return mixed
	 */
	public function parseResponse ( $response );

}