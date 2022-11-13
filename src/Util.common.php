<?php
function common_test(){
	return \Tulparstudyo\Response::success("Test Başarılı");
}
function get_value(Array $array, $key){
	if(isset($array[$key])){
		return $array[$key];
	}
	return null;
}
