<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    use HasFactory;

    protected $fillable = [
        'fk_s_id', 'name_of_patient_passenger', 'meeting_place','driver','destination','contact_num', 'vehicle_name'
    ];

    protected $table = "vehicle";
}
