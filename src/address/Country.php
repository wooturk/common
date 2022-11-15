<?php

namespace Wooturk;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models;

class Country extends Model
{
    use HasFactory;
	protected $fillable = ['name', 'code', 'sort_order','state'];
}
