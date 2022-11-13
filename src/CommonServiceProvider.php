<?php

namespace Tulparstudyo;

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
		Route::get('/common/test', function () {
			return common_test();
		});
	}
	private function loadHelpers(){
		$utils = [
			'brand',
			'user',
		];

		if(is_file(__DIR__ . "/Util.common.php" )){
			include_once( __DIR__ . "/Util.common.php" );
		}
		foreach($utils as $util){
			if(is_file(__DIR__ . "/$util/Util.$util.php" )){
				include_once(__DIR__ . "/$util/Util.$util.php" );
			}
		}
	}
}
