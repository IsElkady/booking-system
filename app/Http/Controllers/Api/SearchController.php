<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\SearchResource;
use App\Services\SearchService;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function __construct(private SearchService $searchService) {}

    public function index(Request $request)
    {
//        $request['city']='Albanien';
//        $request['checkin_date']='20-04-2026';
//        $request['checkout_date']='25-04-2026';
//        $request['guests']=2;
        $data = $request->validate([
            'city' => 'required|string',
            'checkin_date' => 'required|date|after_or_equal:today',
            'checkout_date' => 'required|date|after:checkin_date',
            'guests' => 'required|integer|min:1',
        ]);

        $results = $this->searchService->search($data);

        return SearchResource::collection($results);
    }
}
