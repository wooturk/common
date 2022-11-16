<?php

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
