<?php

namespace App\Http\Controllers;

use App\Models\Tag;

class TagController extends Controller
{
    public function __invoke(Tag $tag)
    {
        $jobs = $tag->jobs()
            ->with('tags', 'employer')
            ->simplePaginate(5);

        return view('search.results', compact('jobs'));
    }
}
