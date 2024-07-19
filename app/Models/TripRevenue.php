<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TripRevenue extends Model
{
    use HasFactory;

    protected $fillable = [
        'driver_id',
        // 'route_id',
        'number_of_trips',
        'off_peak_revenue',
        'on_peak_revenue',
    ];
}
