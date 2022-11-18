<?php

function common_test(){
	Redis::get('user:profile:1');
	return \Wooturk\Response::success("Test Başarılı");
}
function get_services(){
	return [
		'address'=>['code'=>'address', 'name'=>'Adres Servisi', 'access'=>''],
		'brand'=>['code'=>'brand', 'name'=>'Markalar', 'access'=>''],
		'category'=>['code'=>'category', 'name'=>'Ürün Kaategorileri', 'access'=>''],
		'customer'=>['code'=>'customer', 'name'=>'Müşteriler', 'access'=>''],
		'order'=>['code'=>'order', 'name'=>'Sipariş', 'access'=>''],
		'product'=>['code'=>'product', 'name'=>'Ürünler', 'access'=>''],
		'user'=>['code'=>'user', 'name'=>'Kullanıcılar', 'access'=>''],
	];
}
function get_value(Array $array, $key){
	if(isset($array[$key])){
		return $array[$key];
	}
	return null;
}
