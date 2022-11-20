<?php

namespace Wooturk;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models;

class District extends Model
{
    use HasFactory;
	protected $fillable = ['city_id', 'name', 'code', 'rate', 'sort_order','status'];
}
