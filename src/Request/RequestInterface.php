<?php

namespace VMdevelopment\MyFatoorah\Request;

/**
 * Interface RequestInterface
 *
 * @package VMdevelopment\MyFatoorah\Request
 */
interface RequestInterface
{
	/**
	 * @param $params
	 *
	 * @return mixed
	 */
	function send ( $params );


	/**
	 * @param $token
	 *
	 * @return mixed
	 */
	function setAccessToken ( $token );


	/**
	 * @return AccessToken
	 */
	function getAccessToken ();


	/**
	 * @param $headers
	 *
	 * @return mixed
	 */
	function setHeaders ( $headers );


	/**
	 * @param $key
	 * @param $value
	 *
	 * @return mixed
	 */
	function setHeader ( $key, $value );


	/**
	 * @return array
	 */
	function getHeaders ();

}