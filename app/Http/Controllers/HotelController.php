<?php

namespace App\Http\Controllers;

use App\Http\Resources\HotelResource;
use App\Services\HotelService;
use Illuminate\Http\Request;

class HotelController extends Controller
{

    public function __construct(private HotelService $hotelService) {}

    public function index(Request $request)
    {
        $hotels = $this->hotelService->getAll($request->all());

        return view('hotels.index', compact('hotels'));
    }

    public function create()
    {
        return view('hotels.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string',
            'city' => 'required|string',
            'country' => 'required|string',
            'rating' => 'required|integer|min:1|max:5',
        ]);
       // dd($data);
        $this->hotelService->create($data);

        return redirect()->route('hotels.index');
    }

}
