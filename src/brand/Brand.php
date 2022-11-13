<?php

namespace Tulparite;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models;

class Brand extends Model
{
    use HasFactory;
	protected $fillable = ['name', 'code', 'rate', 'sort_order','state'];
}
