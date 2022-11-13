<?php
use App\Models\User;
use Illuminate\Support\Facades\Hash;

function get_users(Array $filter){

}
function find_user(Array $filter){
	$email = isset($filter['email'])?$filter['email']:'';
	$password = isset($filter['password'])?$filter['password']:'';
	if($email && $password){
		$user = User::where('email', $email)->first();
		if($user){
			if(Hash::check($password, $user->password)) {
				return  $user;
			}
		}
	}
	return false;
}
function get_user(Int $id){
	return User::find($id);
}
function create_user( Array $data){
	$row = User::create([
		'name'=>$data['name'],
		'email'=>$data['email'],
		'password'=>bcrypt($data['password']),
	]);
	return $row;
}
function update_user(Int $id, Array $data){

}
function delete_user(Int $id){
	return User::destroy($id);
}
