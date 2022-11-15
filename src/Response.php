<?php
namespace Wooturk;
class Response{
	static public function success($message, $data=[]){
		return[
			'status'=>1,
			'message'=>$message,
			'count'=>is_countable($data)?count($data):0,
			'data'=>$data
		];
	}
	static public function failure($message, $data=[]){
		return[
			'status'=>0,
			'message'=>$message,
			'data'=>$data
		];
	}
	static public function exception($message, $data=[]){
		return[
			'status'=>0,
			'message'=>"Sunucu Hatası! $message",
			'data'=>$data
		];
	}
}
