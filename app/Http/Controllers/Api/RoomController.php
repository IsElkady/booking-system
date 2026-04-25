<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\RoomService;
use App\Http\Resources\RoomResource;

class RoomController extends Controller
{
    public function __construct(private RoomService $roomService) {}

    // create room
    public function store(Request $request)
    {
        $data = $request->validate([
            'hotel_id' => 'required|exists:hotels,id',
            'name' => 'required|string',
            'price_per_night' => 'required|numeric|min:1',
            'max_occupancy' => 'required|integer|min:1',
            'available_rooms' => 'required|integer|min:0',
        ]);

        $room = $this->roomService->create($data);

        return new RoomResource($room);
    }

    // 📌 list rooms (optional بس مفيد)
    public function index()
    {
        $rooms = $this->roomService->getAll();

        return RoomResource::collection($rooms);
    }
}
