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
}
