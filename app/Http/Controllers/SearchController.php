<?php

namespace App\Http\Controllers;

use App\Models\Job;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function __invoke(Request $request)
    {
        $jobs = Job::where('title', 'like', '%' . $request->search . '%')->simplePaginate(5);

        return view('search.results', compact('jobs'));
    }
}
