<?php

namespace Wooturk;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Route;
class CommonServiceProvider extends ServiceProvider
{
	/**
	 * Register services.
	 *
	 * @return void
	 */
	public function register()
	{
		//
	}

	/**
	 * Bootstrap services.
	 *
	 * @return void
	 */
	public function boot()
	{
		//
		$this->loadHelpers();
		$this->wooturk_register_services();
		Route::get('/common/test', function () {
			return common_test();
		});
	}
	private function loadHelpers(){
		$utils = [ 'address', 'brand', 'category', 'customer', 'order', 'product', 'user', ];

		if(is_file(__DIR__ . "/Util.common.php" )){
			include_once( __DIR__ . "/Util.common.php" );
		}
		foreach($utils as $util){
			if(is_file(__DIR__ . "/$util/Util.$util.php" )){
				include_once(__DIR__ . "/$util/Util.$util.php" );
			}
		}
	}
	function wooturk_register_services(){
		$ServiceProviders=[
			'Wooturk\\AuthServiceProvider',
			'Wooturk\\AddressServiceProvider',
			'Wooturk\\BrandServiceProvider',
			'Wooturk\\CategoryServiceProvider',
			'Wooturk\\CustomerServiceProvider',
			'Wooturk\\OrderServiceProvider',
			'Wooturk\\ProductServiceProvider',
			'Wooturk\\UserServiceProvider',
		];
		foreach($ServiceProviders as $ServiceProvider){
			if(class_exists($ServiceProvider)){
				app()->register( \Wooturk\AuthServiceProvider::class );
			}
		}
	}
}
