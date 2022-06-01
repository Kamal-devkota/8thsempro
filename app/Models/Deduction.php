<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Deduction extends Model
{
    use HasFactory;

    protected $fillable = [
        'created_by', 'user_id', 'deduction_name', 'deduction_month', 'deduction_amount', 'deduction_description', 'deletion_status'
    ];
}
