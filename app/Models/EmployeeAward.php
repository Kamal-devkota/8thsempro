<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmployeeAward extends Model
{
    use HasFactory;

    protected $fillable = [
        'created_by', 'employee_id', 'award_category_id', 'gift_item',  'select_month', 'description', 'publication_status', 'deletion_status',
    ];
}
