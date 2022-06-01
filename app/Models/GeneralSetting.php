<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GeneralSetting extends Model
{
    use HasFactory;

    protected $fillable = [
        'updated_by', 'company_name', 'email', 'address_one', 'address_two', 'contact_no', 'web', 'logo'
    ];
}
