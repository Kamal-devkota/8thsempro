<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Folder extends Model
{
    use HasFactory;

    protected $fillable = [
        'created_by', 'folder_name', 'folder_description', 'publication_status', 'deletion_status'
    ];
}
