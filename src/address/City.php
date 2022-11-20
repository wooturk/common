<?php

namespace Wooturk;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models;

class City extends Model
{
    use HasFactory;
	protected $fillable = ['country_id', 'name', 'code', 'sort_order','status'];
}
