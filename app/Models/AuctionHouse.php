<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class AuctionHouse extends Authenticatable
{
    use Notifiable;

    const REGULAR_AUCTION_HOUSE = 'regular';
    const SUBMITTED_AUCTION_HOUSE = 'submitted';

    protected $fillable = [
        'name', 'address', 'type', 'city', 'lat', 'lng', 'phone', 'email', 'website', 'user_id',
    ];
}
