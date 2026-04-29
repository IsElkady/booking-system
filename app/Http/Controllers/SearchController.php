<?php

namespace App\Http\Controllers;

use App\Services\SearchService;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function __construct(private SearchService $searchService) {}

    public function index(Request $request)
    {
        $results = [];

        if ($request->has('city')) {
            $results = $this->searchService->search($request->all());
        }

        return view('search.index', compact('results'));
    }
    public function show()
    {
        return view('search.index');
    }

    public function search(Request $request)
    {
        $data = $request->validate([
            'city' => 'required',
            'checkin_date' => 'required|date|after_or_equal:today',
            'checkout_date' => 'required|date|after:checkin_date',
            'guests' => 'required|integer|min:1',
        ]);

        $results = $this->searchService->search($data);

        return view('search.index', compact('results'));
    }
}
