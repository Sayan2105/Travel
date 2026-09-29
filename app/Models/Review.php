<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    //
    protected $fillable = ['name', 'location', 'quote', 'rating', 'trip_id', 'is_published', 'sort_order'];
}
