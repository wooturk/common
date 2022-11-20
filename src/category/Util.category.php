<?php

use Wooturk\Category;
use Wooturk\CategoryDescription;

function get_categories(Array $filter){
	return Category::get();
}
function find_category(Array $filter){
	$query = \DB::table('categories');
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
function get_category(Int $id){
	return Category::find($id);
}
function create_category( Array $data){
	if(isset($data['parent_id_code'])){
		$filter['code'] = $data['parent_id_code'];
		$parent = find_category($filter);
		unset($data['parent_id_code']);

		if($parent){
			$data['parent_id'] = $parent->id;
		}
	}
	if(  $self =  find_model(['code'=>$data['code']]) ){
		$row = update_model($self->id, $data);
	} else{
		$row = Category::create($data);
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

function update_category(Int $id, Array $data){
	$row = Category::where('id', $id)->update($data);
	if($row){
		$description = [
			'category_id'=>	$id,
			'name'=> get_array_value($data, 'name'),
			'description'=>	get_array_value($data, 'description'),
		];
		//CategoryDescription::where('category', $id)->update($description);
		return $row;
	}
	return false;
}
function delete_category(Int $id){
	CategoryDescription::destroy($id);
	return Category::destroy($id);
}
/*
function create_category( Array $data){
	$row = Category::create($data);
	if($row){
		$description = [
			'category_id'=>	$row->id,
			'name'=>	get_array_value($data, 'name'),
			'description'=>	get_array_value($data, 'description'),
		];
		CategoryDescription::insert($description);
		return $row;
	}
	return false;
}
function get_model(Int $id){
	return CategoryModel::find($id);
}
function get_category_models(Int $id){
	return CategoryModel::where('brand_id', $id)->get();
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
	$brand = CategoryModel::where('id', $id)->update($data);
	/-*
	if($brand){
		$description = [
			'brand_id'=>	$id,
			'name'=> get_array_value($data, 'name'),
			'description'=>	get_array_value($data, 'description'),
		];
		CategoryDescription::where('brand_id', $id)->update($description);
		return $brand;
	}
	*-/
	return false;
}

function create_model( Array $data){
	if(isset($data['brand_id_code'])){
		$filter['code'] = $data['brand_id_code'];
		$brand = find_category($filter);
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
		$row = CategoryModel::create($data);
	}

	if($row){
		$description = [
			'brand_id'=>	$row->id,
			'name'=>	get_array_value($data, 'name'),
			'description'=>	get_array_value($data, 'description'),
		];
		//CategoryDescription::insert($description);
		return $row;
	}
	return false;
}
*/
