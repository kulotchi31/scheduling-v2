<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Equipment extends Model
{
    use HasFactory;

    protected $fillable = [
        'fk_s_id', 'event', 'equipment_name','indoor_outdoor'
    ];

    protected $table = "equipment";
}
