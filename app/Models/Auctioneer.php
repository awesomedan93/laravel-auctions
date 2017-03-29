<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Auctioneer extends Authenticatable
{
    use Notifiable;

    const REGULAR_AUCTIONEER = 'regular';
    const SUBMITTED_AUCTIONEER = 'submitted';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'address', 'type', 'city', 'lat', 'lng', 'phone', 'email', 'website', 'user_id',
    ];

    public function users()
    {
        return $this->belongsTo('Users');
    }
}
