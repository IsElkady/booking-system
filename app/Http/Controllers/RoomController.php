<?php

namespace App\Http\Controllers;

use App\Models\Hotel;
use App\Models\Room;
use App\Services\RoomService;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    public function __construct(private RoomService $roomService) {}

    public function index()
    {
        $rooms = Room::with('hotel')->get();
        $hotels = Hotel::all();

        return view('rooms.index', compact('rooms', 'hotels'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'hotel_id' => 'required|exists:hotels,id',
            'name' => 'required|string',
            'price_per_night' => 'required|numeric',
            'max_occupancy' => 'required|integer|min:1',
            'available_rooms' => 'required|integer|min:0',
        ]);

        $this->roomService->create($data);

        return redirect()->back();
    }
}
