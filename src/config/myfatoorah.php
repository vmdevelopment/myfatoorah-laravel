<?php

return [

	/*
    |--------------------------------------------------------------------------
    | MyFatoorah service mode
    |--------------------------------------------------------------------------
    |
    | Mode can take only two values: "live" and "test"
    |
    */

	"mode" => env( 'MYFATOORAH_MODE', "live" ),

	/*
    |--------------------------------------------------------------------------
    | MyFatoorah authentication details
    |--------------------------------------------------------------------------
    |
    | "username" and "password" fields are mandatory for authorization feature.
	| "token" field must exist in the same array format as you receive from API.
	| For example
	|   "token" => [
	|       "access_token" => "Your Token String",
	|       ".expires" => "Tue, 21 Jan 2020 12:02:10 GMT",
    |   ]
    |
    | Anyway if you do not want to save token here, you can use static method
	|
	|   MyFatoorah::setAccessToken($token)
	|
    | Where token is in the same array type
    |
    |
    */

	"auth" => [
		"username" => env( 'MYFATOORAH_USERNAME' ),
		"password" => env( 'MYFATOORAH_PASSWORD' ),
		"token"    => [
			// Your Token Array Here...
		]
	]
];