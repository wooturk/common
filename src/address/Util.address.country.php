<?php
use Wooturk\Country;

function get_countries(Array $filter){
	return Country::get();
}
function find_country(Array $filter){

}
function get_country(Int $id){
	return Country::find($id);
}
function create_country( Array $data){
	$row = Country::create($data);
	if($row){
		return $row;
	}
	return false;
}
function update_country(Int $id, Array $data){
	$row = Country::find($id);
	if($row){
		Country::where('id', $id)->update($data);
		return get_country($id);
	}
	return false;
}
function delete_country(Int $id){
	if($row = Country::find($id)){
		Country::destroy($id);
		return $row;
	}
	return false;
}
