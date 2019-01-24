<?php

namespace VMdevelopment\MyFatoorah\Services;

use VMdevelopment\MyFatoorah\Support\AccessToken;

class Auth extends AbstractService
{
	protected $endpoint = "Token";


	public function __construct()
	{
		parent::__construct();

		$this->requestData->set( 'grant_type', 'password' );
		$this->setUsername( config( 'myfatoorah.auth.username' ) );
		$this->setPassword( config( 'myfatoorah.auth.password' ) );
	}


	/**
	 * @param mixed $username
	 */
	public function setUsername( $username ): void
	{
		$this->requestData->set( 'username', $username );
	}


	/**
	 * @param mixed $password
	 */
	public function setPassword( $password ): void
	{
		$this->requestData->set( 'password', $password );
	}


	public function make()
	{
		$resp = $this->client->post(
			$this->getRequestUrl(), [
				"headers"     => $this->headers->all(),
				"form_params" => $this->requestData->all(),
			]
		)->getBody()->getContents();

		return new AccessToken(
			json_decode(
				$resp,
				true
			)
		);
	}


	/**
	 * @return mixed
	 */
	public function getUsername()
	{
		return $this->requestData->get( 'username' );
	}


	/**
	 * @return mixed
	 */
	public function getPassword()
	{
		return $this->requestData->get( 'password' );
	}
}