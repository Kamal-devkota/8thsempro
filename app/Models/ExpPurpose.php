<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExpPurpose extends Model
{
    use HasFactory;

    protected $fillable = [
		'exp_name', 'created_by',
	];
}
