<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PersonalEvent extends Model
{
    use HasFactory;

    protected $fillable = [
        'created_by', 'personal_event', 'start_date', 'end_date', 'publication_status', 'personal_event_description', 'deletion_status'
    ];
}
