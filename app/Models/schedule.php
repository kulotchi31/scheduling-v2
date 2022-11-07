<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class schedule extends Model
{
    use HasFactory;

       protected $fillable = [
        'title','s_id','type', 'current_date', 'start','end','date_from','date_to','time_from','time_to','req_person','contact_number','barangay'
    ];

    protected $table = "schedule";
}
