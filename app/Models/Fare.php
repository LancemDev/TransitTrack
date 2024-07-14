<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fare extends Model
{
    use HasFactory;

    protected $fillable = [
        'route_id',
        'off_peak_fare_1',
        'off_peak_fare_2',
        'on_peak_fare_1',
        'on_peak_fare_2',
    ];
}
