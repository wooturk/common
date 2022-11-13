<?php

use Tulparstudyo\Brand;
use Tulparstudyo\BrandDescription;

function get_brands(Array $filter){
	return Brand::get();
}
function find_brand(Array $filter){

}
function get_brand(Int $id){
	return Brand::find($id);
}
function create_brand( Array $data){
	$row = Brand::create($data);
	if($row){
		$description = [
			'brand_id'=>	$row->id,
			'name'=>	get_value($data, 'name'),
			'description'=>	get_value($data, 'description'),
		];
		BrandDescription::insert($description);
		return $row;
	}
	return false;
}
function update_brand(Int $id, Array $data){
	$brand = Brand::where('id', $id)->update($data);
	if($brand){
		$description = [
			'brand_id'=>	$id,
			'name'=> get_value($data, 'name'),
			'description'=>	get_value($data, 'description'),
		];
		BrandDescription::where('brand_id', $id)->update($description);
		return $brand;
	}
	return false;
}
function delete_brand(Int $id){
	BrandDescription::destroy($id);
	return Brand::destroy($id);
}
