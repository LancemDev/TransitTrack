<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Auth;

class SaccoAdmin extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        // 'role',
        'phone',
        'sacco_id',
        'password',
        'last_login',
        'last_logout'
    ];

    public function sacco()
    {
        return $this->belongsTo(Sacco::class, 'sacco_id');
    }
}
