<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExpenseManagement extends Model
{
    use HasFactory;

    protected $fillable = [
		'created_by', 'employee_id', 'item_name', 'purchased_from', 'purchased_date', 'amount_spent', 'purchased_details', 'deletion_status', 
	];
}
