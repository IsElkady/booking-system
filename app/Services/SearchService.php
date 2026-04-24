<?php

namespace App\Services;

use Carbon\Carbon;

class SearchService
{
    public function search($filters)
    {
        $city = $filters['city'] ?? null;
        $guests = $filters['guests'] ?? 1;

        $checkin = Carbon::parse($filters['checkin_date']);
        $checkout = Carbon::parse($filters['checkout_date']);

        $nights = $checkin->diffInDays($checkout);

        $hotels = Hotel::with(['rooms' => function ($query) use ($guests) {
            $query->where('available_rooms', '>', 0)
                ->where('max_occupancy', '>=', $guests);
        }])
            ->when($city, function ($query) use ($city) {
                $query->where('city', $city);
            })
            ->get();

        // نفلتر الفنادق اللي معندهاش غرف متاحة
        $hotels = $hotels->filter(function ($hotel) {
            return $hotel->rooms->isNotEmpty();
        });

        // نحسب السعر
        return $hotels->map(function ($hotel) use ($nights) {
            return [
                'hotel' => $hotel,
                'rooms' => $hotel->rooms,
                'total_price' => $hotel->rooms->map(function ($room) use ($nights) {
                    return [
                        'room_id' => $room->id,
                        'price_per_night' => $room->price_per_night,
                        'total_price' => $room->price_per_night * $nights,
                    ];
                })
            ];
        })->values();
    }
}
