<?php

namespace VMdevelopment\MyFatoorah\Request;

use VMdevelopment\MyFatoorah\HttpClient\GuzzleClient;

/**
 * Class RequestAbstract
 *
 * @package VMdevelopment\MyFatoorah\Request
 */
abstract class RequestAbstract implements RequestInterface
{
	/**
	 * @var string
	 */
	protected $basePath = "https://apidemo.myfatoorah.com/";

	/**
	 * @var AccessToken
	 */
	protected $access_token;

	/**
	 * @var array
	 */
	protected $headers;

	/**
	 * @var \GuzzleHttp\ClientInterface
	 */
	protected $client;


	/**
	 * RequestAbstract constructor.
	 */
	public function __construct ()
	{
		$this->client = new GuzzleClient();
	}


	/**
	 * @return AccessToken
	 */
	public function getAccessToken ()
	{
		return $this->access_token;
	}


	/**
	 * @param $token
	 *
	 * @throws \Exception
	 */
	public function setAccessToken ( $token )
	{
		$token = new AccessToken( $token );

		if ( $token->isExpired() )
			throw new \Exception( "Token is Expired" );

		$this->setHeader( 'Authorization', 'Bearer ' . $token->getToken() );
		$this->access_token = $token;
	}


	/**
	 * @param $key
	 * @param $value
	 */
	public function setHeader ( $key, $value )
	{
		$this->headers[ $key ] = $value;
	}


	/**
	 * @return array
	 */
	public function getHeaders ()
	{
		return $this->headers;
	}


	/**
	 * @param $headers
	 */
	public function setHeaders ( $headers )
	{
		$this->headers = $headers;
	}
}