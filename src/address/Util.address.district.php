<?php
use Wooturk\District;

function get_districts(Array $filter, $id){
	return District::where('city_id', $id)->get();
}
function find_district(Array $filter){

}
function get_district(Int $id){
	return District::find($id);
}
function create_district( Array $data){
	if(get_city($data['city_id'])){
		$row = District::create($data);
		if($row){
			return $row;
		}
	}
	return false;
}
function update_district(Int $id, Array $data){
	if(get_city($data['city_id'])){
		$row = District::find($id);;
		if($row){
			District::where('id', $id)->update($data);
			return get_district($id);
		}
	}
	return false;
}
function delete_district(Int $id){
	if($row = District::find($id)){
		District::destroy($id);
		return $row;
	}
	return false;
}
