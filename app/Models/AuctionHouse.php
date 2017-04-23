<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AuctionHouse extends Model
{

    const REGULAR_AUCTION_HOUSE = 'regular';
    const SUBMITTED_AUCTION_HOUSE = 'submitted';

    protected $fillable = [
        'name', 'slug', 'address', 'type', 'city', 'lat', 'lng', 'phone', 'email', 'website', 'user_id',
    ];
}
