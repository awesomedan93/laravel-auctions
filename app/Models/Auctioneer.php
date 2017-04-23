<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Auctioneer extends Model
{

    const REGULAR_AUCTIONEER = 'regular';
    const SUBMITTED_AUCTIONEER = 'submitted';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'slug', 'address', 'type', 'city', 'lat', 'lng', 'phone', 'email', 'website', 'user_id',
    ];

    public function users()
    {
        return $this->belongsTo('Users');
    }
}
