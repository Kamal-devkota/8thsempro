<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    use HasFactory;

    protected $fillable = [
        'created_by', 'folder_id' , 'file_name', 'caption','publication_status', 'deletion_status'
    ];
}
