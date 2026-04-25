<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Hotel;
use App\Models\Room;

class DashboardController extends Controller
{
    public function index()
    {
        return view('dashboard', [
            'hotelsCount' => Hotel::count(),
            'roomsCount' => Room::count(),
        ]);
    }
}
