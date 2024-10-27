<?php

namespace App\Http\Controllers;

use App\Facades\TmdbApiService;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class BrowseController extends Controller
{
    public function person(int $id, string $slug)
    {
        $director = Str::title(str_replace('-', ' ', $slug));
        $results = TmdbApiService::person($id)->paginate(10);

        return view('browse', [
            'query' => $director,
            'results' => $results,
            'totalResults' => $results->total(),
        ]);
    }

    public function search(Request $request)
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
