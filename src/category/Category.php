<?php

namespace Wooturk;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models;

class Category extends Model
{
    use HasFactory;
	protected $fillable = ['name', 'parent_id', 'code', 'slug', 'path', 'rate', 'sort_order','status'];
}
