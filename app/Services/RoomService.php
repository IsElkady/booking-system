<?php

namespace App\Services;

use App\Models\Room;

class RoomService
{
    public function create(array $data)
    {
        return Room::create($data);
    }

    public function getAll()
    {
        return Room::with('hotel')->latest()->paginate(10);
    }
}
