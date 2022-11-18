<?php

namespace Wooturk;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models;

class Customer extends Model
{
    use HasFactory;
	protected $fillable = ['name', 'email', 'password'];
}
