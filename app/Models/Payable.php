<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payable extends Model
{
    use HasFactory;

    protected $fillable = [
        'created_by', 'job_id', 'payable_amount', 'short_note', 'tax', 'tax_method' , 'tax_amount',
    ];
}
