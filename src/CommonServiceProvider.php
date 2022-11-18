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
		$this->register_services();
		Route::get('/common/test', function () {
			return common_test();
		});
	}
	private function loadHelpers(){
		if(is_file(__DIR__ . "/Util.common.php" )){
			include_once( __DIR__ . "/Util.common.php" );
		}
		if( $utils = get_services() ){
			foreach($utils as $util){
				if(is_file(__DIR__ . "/".$util['code']."/Util.".$util['code'].".php" )){
					include_once(__DIR__ . "/".$util['code']."/Util.".$util['code'].".php" );
				}
			}
		}
	}
	function register_services(){
		if( $utils = get_services() ){
			foreach($utils as $util){
				$ServiceProvider = 'Wooturk\\'.ucfirst($util['code']).'ServiceProvider';
				if(class_exists($ServiceProvider)){
					app()->register( $ServiceProvider );
				}
			}
		}
	}
	static function Install(){
		$str = "Wooturk Kurulumu Tamamlandı";
		echo "\033[36m$str \033[0m\n";
		$str = "config/app.php içerisine \033[31mWooturk\CommonServiceProvider::class\033[0m ekleyiniz";
		echo "\033[36m$str \033[0m\n";
		if( $utils = get_services() ){
			$str = "Kurulu Servisler";
			echo "\033[36m$str \033[0m\n";
			$sira = 1;
			foreach($utils as $util){
				$str = "  ".($sira++).".".$util['name'];
				echo "\033[36m$str \033[0m\n";
			}
		}
	}
}
