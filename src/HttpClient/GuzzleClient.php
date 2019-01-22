<?php

namespace VMdevelopment\MyFatoorah\HttpClient;

use GuzzleHttp\Client;

/**
 * Class GuzzleClient
 *
 * @package VMdevelopment\MyFatoorah\HttpClient
 */
class GuzzleClient extends HttpClientAbstract
{

	/**
	 * @var Client
	 */
	private $client;


	/**
	 * GuzzleClient constructor.
	 */
	public function __construct ()
	{
		$this->client = new Client();
	}


	/**
	 * @param string $path
	 * @param        $parameters
	 *
	 * @return mixed
	 */
	public function get ( string $path, array $parameters = null )
	{
		return $this->parseResponse( $this->client->get( $path ) );
	}


	/**
	 * @param $response
	 *
	 * @return mixed
	 */
	public function parseResponse ( $response )
	{
		return $response->getBody()->getContents();
	}


	/**
	 * @param string $path
	 * @param array  $parameters
	 *
	 * @return mixed
	 */
	public function post ( string $path, array $parameters = null )
	{
		return $this->parseResponse(
			$this->client->post( $path, $parameters )
		);
	}
}