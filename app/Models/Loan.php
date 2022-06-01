<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Loan extends Model
{
    use HasFactory;

    protected $fillable = [
		'created_by', 'user_id', 'loan_name', 'loan_amount', 'number_of_installments', 'remaining_installments' ,'loan_description', 'deletion_status'
	];
}
