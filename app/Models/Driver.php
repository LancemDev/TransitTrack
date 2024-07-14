<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Driver extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'phone',
        'avatar_path',
        'password',
        'sacco_id',
        'last_login',
        'last_logout'
    ];

    public function sacco()
    {
        return $this->belongsTo(Sacco::class); // Assuming 'sacco_id' is the foreign key in the drivers table
    }

    protected $appends = ['latest_activity_status'];

    public function getLatestActivityStatusAttribute()
    {
        $latestActivity = $this->activities()->latest('clock_in')->first();

        if (!$latestActivity) {
            return 'yet to start working';
        }

        if ($latestActivity->clock_out === null) {
            return 'currently in a trip';
        }

        return 'clocked out';
    }

    public function activities()
    {
        return $this->hasMany(DriverActivity::class);
    }
    
}
