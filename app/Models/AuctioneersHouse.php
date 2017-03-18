<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class AuctioneersHouse extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'name', 'address', 'lat', 'lng', 'phone', 'email', 'website', 'user_id',
    ];
}
