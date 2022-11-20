<?php

namespace Wooturk;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models;

class BrandModel extends Model
{
    use HasFactory;
	protected $fillable = ['name', 'brand_id', 'parent_id', 'code', 'code', 'slug', 'rate', 'sort_order','status'];
}
