<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TripDay extends Model
{
    protected $fillable = ['trip_id', 'day_number', 'title', 'description', 'image'];

    public function trip()
    {
        return $this->belongsTo(Trip::class);
    }
}
