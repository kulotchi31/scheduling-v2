<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'fk_s_id', 'purpose', 'attendees','facility_name'
    ];

    protected $table = "event";
}
