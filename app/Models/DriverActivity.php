<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DriverActivity extends Model
{
    use HasFactory;

    protected $fillable = [
        'driver_id',
        'clock_in',
        'clock_out',
        'route_id',
    ];
}
