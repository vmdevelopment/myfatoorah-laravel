<?php
/**
 * Created by PhpStorm.
 * User: Vanand Mkrtchyan
 * Date: 22-Jan-19
 * Time: 11:17 PM
 */

namespace VMdevelopment\MyFatoorah\Services;

interface ServiceInterface
{
	public function setAccessToken ( $token );


	/**
	 * @return \VMdevelopment\MyFatoorah\Request\AccessToken
	 */
	public function getAccessToken ();
}