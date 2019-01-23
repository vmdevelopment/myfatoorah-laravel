<?php
/**
 * Created by PhpStorm.
 * User: Vanand Mkrtchyan
 * Date: 23-Jan-19
 * Time: 2:45 PM
 */

namespace VMdevelopment\MyFatoorah\Contracts;

interface HttpClient
{
	function post( $url, array $params );


	function get( $url, array $params );
	//	function put();
	//	function patch();
	//	function delete();
}