<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SetTime extends Model
{
    use HasFactory;

    protected $fillable = [
		'created_by', 'in_time', 'time_time',
	];
}
