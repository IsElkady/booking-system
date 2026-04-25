<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\HotelResource;
use App\Services\HotelService;
use Illuminate\Http\Request;

class HotelController extends Controller
{
    public function __construct(private HotelService $hotelService){}
    public function index(Request $request)
    {
        $hotels = $this->hotelService->getAll($request->all());

        return HotelResource::collection($hotels);
    }
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string',
            'city' => 'required|string',
            'country' => 'required|string',
            'rating' => 'required|integer|min:1|max:5',
        ]);

        $hotel = $this->hotelService->create($data);

        return new HotelResource($hotel);
    }

}
