<?php

use Wooturk\Brand;
use Wooturk\BrandDescription;
use Wooturk\BrandModel;
function get_brands(Array $filter){
	return Brand::get();
}
function find_brand(Array $filter){
	$query = \DB::table('brands');
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
function get_brand(Int $id){
	return Brand::find($id);
}
function create_brand( Array $data){
	$row = Brand::create($data);
	if($row){
		$description = [
			'brand_id'=>	$row->id,
			'name'=>	get_array_value($data, 'name'),
			'description'=>	get_array_value($data, 'description'),
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
			'name'=> get_array_value($data, 'name'),
			'description'=>	get_array_value($data, 'description'),
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
function get_model(Int $id){
	return BrandModel::find($id);
}
function get_brand_models(Int $id){
	return BrandModel::where('brand_id', $id)->get();
}

function find_model(Array $filter){
	$query = DB::table('brand_models');
	if(isset($filter['id'])){
		$query->where('id', $filter['id']);
	}
	if(isset($filter['name'])){
		$query->where('name', $filter['name']);
	}
	if(isset($filter['code'])){
		$query->where('code', $filter['code']);
	}
	return $query->limit(1)->get()->first();
}
function update_model(Int $id, Array $data){
	$brand = BrandModel::where('id', $id)->update($data);
	/*
	if($brand){
		$description = [
			'brand_id'=>	$id,
			'name'=> get_array_value($data, 'name'),
			'description'=>	get_array_value($data, 'description'),
		];
		BrandDescription::where('brand_id', $id)->update($description);
		return $brand;
	}
	*/
	return false;
}

function create_model( Array $data){
	if(isset($data['brand_id_code'])){
		$filter['code'] = $data['brand_id_code'];
		$brand = find_brand($filter);
		unset($data['brand_id_code']);

		if($brand){
			$data['brand_id'] = $brand->id;
		}
	}
	if(isset($data['parent_id_code'])){
		$filter['code'] = $data['parent_id_code'];
		$model = find_model($filter);
		if($model){
			$data['parent_id'] = $model->id;
		}
		unset($data['parent_id_code']);
	}
	if(  $self =  find_model(['code'=>$data['code']]) ){
		$row = update_model($self->id, $data);
	} else{
		$row = BrandModel::create($data);
	}

	if($row){
		$description = [
			'brand_id'=>	$row->id,
			'name'=>	get_array_value($data, 'name'),
			'description'=>	get_array_value($data, 'description'),
		];
		//BrandDescription::insert($description);
		return $row;
	}
	return false;
}
