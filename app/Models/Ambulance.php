<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ambulance extends Model
{
    use HasFactory;
    protected $fillable = [
        'ambulance_num',
        'e_level',
        'ambulance_capacity',
    ];

}
