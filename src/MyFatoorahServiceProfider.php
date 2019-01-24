<?php

namespace VMdevelopment\MyFatoorah;

use Illuminate\Support\ServiceProvider;

/**
 * Class MyFatoorahServiceProfider
 *
 * @package VMdevelopment\MyFatoorah\Providers
 */
class MyFatoorahServiceProfider extends ServiceProvider
{
	/**
	 * Bootstrap MyFatoorah application services.
	 *
	 * @return void
	 */
	public function boot ()
	{
		$this->publishes(
			[
				__DIR__ . '/config/myfatoorah.php' => config_path( 'myfatoorah.php' ),
			]
		);
		$this->mergeConfigFrom(
			__DIR__ . '/config/myfatoorah.php',
			'myfatoorah'
		);
	}


	/**
	 * Register MyFatoorah application services.
	 *
	 * @return void
	 */
	public function register ()
	{
		$this->app->singleton(
			'myfatoorah', function() {
			return new Myfatoorah();
		}
		);
	}
}