<?php

use Wooturk\Option;
use Wooturk\OptionDescription;
use Wooturk\OptionModel;
function get_options(Array $filter){
	return Option::get();
}
function find_option(Array $filter){
	$query = \DB::table('options');
	if(isset($filter['id'])){
		$query->where('id', $filter['ig']);
	}
	if(isset($filter['name'])){
		$query->where('name', $filter['name']);
	}
	if(isset($filter['code'])){
		$query->where('code', $filter['code']);
	}
	return $query->limit(1)->first();
}
function get_option(Int $id){
	return Option::find($id);
}
function create_option( Array $data){
	$row = Option::create($data);
	if($row){
		/*
		$description = [
			'option_id'=>	$row->id,
			'name'=>	get_array_value($data, 'name'),
			'description'=>	get_array_value($data, 'description'),
		];
		OptionDescription::insert($description);
		*/
		return $row;
	}
	return false;
}
function update_option(Int $id, Array $data){
	$row = Option::where('id', $id)->update($data);
	if($row){
		/*
		$description = [
			'option_id'=>	$id,
			'name'=> get_array_value($data, 'name'),
			'description'=>	get_array_value($data, 'description'),
		];
		OptionDescription::where('option_id', $id)->update($description);
		*/
		return $row;
	}
	return false;
}
function delete_option(Int $id){
	OptionDescription::destroy($id);
	return Option::destroy($id);
}
