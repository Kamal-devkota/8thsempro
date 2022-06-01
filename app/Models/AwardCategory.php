<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AwardCategory extends Model
{
    use HasFactory;

    protected $fillable = [
		'created_by', 'award_title', 'publication_status', 'deletion_status',
	];  
}
