<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dancer extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'imagen',
        'lat',
        'lng',
        'video',
        'history',
        'positionSaturday',
        'positionSunday'
    ];
}
