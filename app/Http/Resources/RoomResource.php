<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class RoomResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'hotel' => [
                'id' => $this->hotel->id,
                'name' => $this->hotel->name,
            ],
            'name' => $this->name,
            'price_per_night' => $this->price_per_night,
            'max_occupancy' => $this->max_occupancy,
            'available_rooms' => $this->available_rooms,
        ];
    }
}
