<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function store(Request $request): JsonResponse
    {
        $data = $request->validate([
            'trip_id'        => ['required', 'exists:trips,id'],
            'name'           => ['required', 'string', 'max:100'],
            'phone'          => ['required', 'regex:/^\+?[0-9]{10,15}$/'],
            'email'          => ['nullable', 'email', 'max:150'],
            'travellers'     => ['nullable', 'integer', 'min:1', 'max:100'],
            'preferred_date' => ['nullable', 'date', 'after_or_equal:today'],
            'message'        => ['nullable', 'string', 'max:1000'],
        ]);

        $booking = Booking::create($data);

        return response()->json([
            'message' => 'Enquiry saved',
            'id'      => $booking->id,
        ], 201);
    }
}