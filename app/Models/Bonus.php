<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bonus extends Model
{
    use HasFactory;

    protected $fillable = [
        'created_by', 'user_id', 'bonus_name', 'bonus_month', 'bonus_amount', 'bonus_description', 'deletion_status'
    ];
}
