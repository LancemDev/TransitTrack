<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BoardAlert extends Model
{
    protected $fillable = ['driver_id', 'vehicle_id', 'status'];
    use HasFactory;
}
