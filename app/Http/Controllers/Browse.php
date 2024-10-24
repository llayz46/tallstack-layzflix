<?php

namespace App\Http\Controllers;

use App\Facades\TmdbApiService;
use Illuminate\Http\Request;

class Browse extends Controller
{
    public function __invoke(Request $request)
    {
        $query = $request->query('q');
        $results = TmdbApiService::search($query)->paginate(10);

        return view('browse', [
            'query' => $query,
            'results' => $results,
            'totalResults' => $results->total(),
        ]);
    }
}
