<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class SearchResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'hotel' => [
                'id' => $this['hotel']['id'],
                'name' => $this['hotel']['name'],
                'city' => $this['hotel']['city'],
                'country' => $this['hotel']['country'],
                'rating' => $this['hotel']['rating'],
            ],

            'rooms' => collect($this['rooms'])->map(function ($room) {
                return [
                    'room_id' => $room['room_id'],
                    'price_per_night' => $room['price_per_night'],
                    'total_price' => $room['total_price'],
                ];
            })->values(),
        ];
    }
}
