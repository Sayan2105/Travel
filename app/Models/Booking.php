<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;


class Booking extends Model
{
    protected $fillable = [
        'trip_id',
        'name',
        'phone',
        'email',
        'travellers',
        'preferred_date',
        'message',
        'status',
        'internal_notes',
    ];

    protected $casts = [
        'preferred_date' => 'date',
    ];

    protected static function booted(): void {
        // When a booking is saved
        static::saving(function (Booking $booking) {
            $oldTripId = $booking->getOriginal('trip_id');
            $oldSeats = $booking->getOriginal('status') === 'confirmed'
                ? max(1, (int) $booking->getOriginal('travellers'))
                : 0;
            $newSeats = $booking->status === 'confirmed'
                ? max(1, (int) $booking->travellers)
                : 0;

            if ($oldSeats === 0 && $newSeats === 0) {
                return;
            }

            DB::transaction(function () use ($booking, $oldTripId, $oldSeats, $newSeats) {
                // Give back seats held by the old version of this booking
                if ($oldSeats > 0 && $oldTripId) {
                    Trip::whereKey($oldTripId)
                        ->whereNotNull('seats_left')
                        ->increment('seats_left', $oldSeats);
                }

                // Take seats for the new version
                if ($newSeats > 0) {
                    $trip = Trip::lockForUpdate()->find($booking->trip_id);

                    if ($trip && $trip->seats_left !== null) {
                        if ($trip->seats_left < $newSeats) {
                            throw ValidationException::withMessages([
                                'data.status' => "Only {$trip->seats_left} seat(s) left on this trip.",
                            ]);
                        }

                        $trip->decrement('seats_left', $newSeats);
                    }
                }
            });
        });

        // When a confirmed booking is deleted, give the seats back
        static::deleting(function (Booking $booking) {
            if ($booking->status === 'confirmed') {
                Trip::whereKey($booking->trip_id)
                    ->whereNotNull('seats_left')
                    ->increment('seats_left', max(1, (int) $booking->travellers));
            }
        });
    }

    public function trip(): BelongsTo
    {
        return $this->belongsTo(Trip::class);
    }
}