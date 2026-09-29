<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Trip extends Model
{
    //
    protected $fillable = ['is_published', 'description', 'seats_left', 'max_group_size', 'duration_days', 'price', 'cover_image', 'tagline', 'slug', 'title'];

    public function days() {
        return $this->hasMany(TripDay::class)->orderBy('day_number');
    }
}
