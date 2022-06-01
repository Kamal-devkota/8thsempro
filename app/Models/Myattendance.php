<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Myattendance extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'name', 'check_in', 'check_out', 'date', 'accno','empidno','autosign','timetable','onduty','offduty','normal','realtime','late','early','absent','ottime','worktime','exception','mustcin','mustcout','department','ndays','weekend','holiday','atttime','ndaysot','weekendot','holidayot',
    ];
}
