<?php
use \Illuminate\Http\Request;
if(defined('WOOTURK_VER')) exit;
define('WOOTURK_VER', '1.0.0');
function common_test(){
	//Redis::get('user:profile:1');
	return \Wooturk\Response::success("Test Başarılı");
}
function get_user_role(	){
	if(auth()->user()){
		return auth()->user()->role;
	}
	return 'quest';
}
function get_services(){
	return [
		'address'=>[
			'code'=>'address',
			'name'=>'Adres Servisi',
			'access'=> [
				'user' =>[
					'index'=>false,
					'get'=>false,
					'create'=>false,
					'edit'=>false,
					'delete'=>false,
					'list'=>true,
				],
				'customer' =>[
					'index'=>false,
					'get'=>false,
					'create'=>false,
					'edit'=>false,
					'delete'=>false,
					'list'=>false,
				],
				'quest'=>[

				]
			]
		],
		'brand'=>[
			'code'=>'brand',
			'name'=>'Markalar',
			'access'=> [
				'user' =>[
					'index'=>false,
					'get'=>false,
					'create'=>false,
					'edit'=>false,
					'delete'=>false,
					'list'=>true,
				],
				'customer' =>[
					'index'=>false,
					'get'=>false,
					'create'=>false,
					'edit'=>false,
					'delete'=>false,
					'list'=>false,
				],
				'quest'=>[

				]
			]
		],
		'category'=>[
			'code'=>'category',
			'name'=>'Ürün Kaategorileri',
			'access'=> [
				'user' =>[
					'index'=>false,
					'get'=>false,
					'create'=>false,
					'edit'=>false,
					'delete'=>false,
					'list'=>true,
				],
				'customer' =>[
					'index'=>false,
					'get'=>false,
					'create'=>false,
					'edit'=>false,
					'delete'=>false,
					'list'=>false,
				],
				'quest'=>[

				]
			]
		],
		'customer'=>[
			'code'=>'customer',
			'name'=>'Müşteriler',
			'access'=> [
				'user' =>[
					'index'=>false,
					'get'=>false,
					'create'=>false,
					'edit'=>false,
					'delete'=>false,
					'list'=>true,
				],
				'customer' =>[
					'index'=>false,
					'get'=>false,
					'create'=>false,
					'edit'=>false,
					'delete'=>false,
					'list'=>false,
				],
				'quest'=>[

				]
			]
		],
		'order'=>[
			'code'=>'order',
			'name'=>'Sipariş',
			'access'=> [
				'user' =>[
					'index'=>false,
					'get'=>false,
					'create'=>false,
					'edit'=>false,
					'delete'=>false,
					'list'=>true,
				],
				'customer' =>[
					'index'=>false,
					'get'=>false,
					'create'=>false,
					'edit'=>false,
					'delete'=>false,
					'list'=>false,
				],
				'quest'=>[

				]
			]
		],
		'product'=>[
			'code'=>'product',
			'name'=>'Ürünler',
			'access'=>[

			]
		],
		'user'=> [
				'code'=>'user',
				'name'=>'Kullanıcılar',
				'access'=> [
					'user' =>[
						'index'=>false,
						'get'=>false,
						'create'=>false,
						'edit'=>false,
						'delete'=>false,
						'list'=>true,
					],
					'customer' =>[
						'index'=>false,
						'get'=>false,
						'create'=>false,
						'edit'=>false,
						'delete'=>false,
						'list'=>false,
					],
					'quest'=>[

					]
				]
			],
		'option'=> [
				'code'=>'option',
				'name'=>'Ürün Seçemekleri',
				'access'=> [
					'user' =>[
						'index'=>false,
						'get'=>false,
						'create'=>false,
						'edit'=>false,
						'delete'=>false,
						'list'=>true,
					],
					'customer' =>[
						'index'=>false,
						'get'=>false,
						'create'=>false,
						'edit'=>false,
						'delete'=>false,
						'list'=>false,
					],
					'quest'=>[

					]
				]
			],
	];
}
function user_has_service_access( Request $request ){
	$role = get_user_role();
	if($role=='admin'){
		return true;
	}
	$routeName = $request->route()->getName();
	$parts = explode('-', $routeName);
	if(count($parts)>1){
		$service = $parts[0];
		$route = $parts[1];
	}
	$services = get_services();
	if($services && isset($services[$service])){
		if(isset($services[$service]['access'])){
			if(!empty($services[$service]['access'])){
				if(isset($services[$service]['access'][$role])){
					return  $services[$service]['access'][$role][$route];
				}
			}
		}
	}
	return false;
}
function get_array_value(Array $array, $key){
	if(isset($array[$key])){
		return $array[$key];
	}
	return null;
}
