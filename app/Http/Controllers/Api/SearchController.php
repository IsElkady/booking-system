<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\SearchService;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function __construct(private SearchService $searchService) {}

    public function index(Request $request)
    {
        $data = $request->validate([
            'city' => 'required|string',
            'checkin_date' => 'required|date',
            'checkout_date' => 'required|date|after:checkin_date',
            'guests' => 'required|integer|min:1',
        ]);

        $results = $this->searchService->search($data);

        return response()->json([
            'data' => $results
        ]);
    }
}
