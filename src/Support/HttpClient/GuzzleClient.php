<?php

namespace VMdevelopment\MyFatoorah\Support\HttpClient;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;
use GuzzleHttp\Exception\ServerException;
use VMdevelopment\MyFatoorah\Contracts\HttpClient;

class GuzzleClient implements HttpClient
{

	private $client;


	public function __construct()
	{
		$this->client = new Client();
	}


	function post( $url, array $params )
	{
		try {
			return json_decode( $this->client->post( $url, $params )->getBody(), true );
		}
		catch ( ClientException $exception ) {
			return json_decode( $exception->getResponse()->getBody() );
		}
		catch ( ServerException $exception ) {
			return json_decode( $exception->getResponse()->getBody() );
		}
	}


	function get( $url, array $params )
	{
		try {
			return json_decode( $this->client->get( $url, $params )->getBody(), true );
		}
		catch ( ClientException $exception ) {
			return json_decode( $exception->getResponse()->getBody() );
		}
		catch ( ServerException $exception ) {
			return json_decode( $exception->getResponse()->getBody() );
		}
	}
}