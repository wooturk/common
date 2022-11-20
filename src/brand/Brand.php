<?php

namespace Wooturk;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models;

class Brand extends Model
{
    use HasFactory;
	protected $fillable = ['name', 'code', 'slug', 'rate', 'sort_order','status'];
}
