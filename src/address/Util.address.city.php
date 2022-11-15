<?php
use Wooturk\City;

function get_cities(Array $filter, $country_id){
	return City::where('country_id', $country_id)->get();
}
function find_city(Array $filter){

}
function get_city(Int $id){
	return City::find($id);
}
function create_city( Array $data){
	if(get_country($data['country_id'])){
		$row = City::create($data);
		if($row){
			return $row;
		}
	}
	return false;
}
function update_city(Int $id, Array $data){
	unset($data['country_id']);
	$row = City::find($id);
	if($row){
		City::where('id', $id)->update($data);
		return get_city($id);
	}
	return false;
}
function delete_city(Int $id){
	if($row = City::find($id)){
		City::destroy($id);
		return $row;
	}
	return false;
}
