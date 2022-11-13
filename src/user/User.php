<?php

namespace Tulparstudyo;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models;

class User extends Model
{
    use HasFactory;
	protected $fillable = ['name', 'email', 'password'];
}
