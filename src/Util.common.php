<?php
echo "oldu.";
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
			app()->register( $ServiceProvider );
		}
	}
}

function common_test(){
	Redis::get('user:profile:1');
	return \Wooturk\Response::success("Test Başarılı");
}
function get_value(Array $array, $key){
	if(isset($array[$key])){
		return $array[$key];
	}
	return null;
}
