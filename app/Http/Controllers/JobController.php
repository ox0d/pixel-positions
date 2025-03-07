<?php

namespace App\Http\Controllers;

use App\Models\Job;
use App\Http\Requests\StoreJobRequest;
use App\Http\Requests\UpdateJobRequest;
use App\Models\Tag;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;

class JobController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $jobs = Job::latest()->with('tags', 'employer')->get()->groupBy('featured');
        $tags = Tag::all();

        return view('jobs.index', [
            'jobs' => $jobs[0],
            'featuredJobs' => $jobs[1],
            'tags' => $tags,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('jobs.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreJobRequest $request)
    {
        $attributes = $request->validated();

        $jobs = Auth::user()->employer->jobs()->create(Arr::except($attributes, 'tags'));

        if ($attributes['tags']) {
            $tagIds = [];
            foreach (explode(',', $attributes['tags']) as $tagName) {
                $tag = Tag::firstOrCreate(['name' => ucwords(str_replace('-', ' ', trim($tagName)))]);
                $tagIds[] = $tag->id; // Collect tag IDs
            }

            $jobs->tags()->attach($tagIds);
        }

        return redirect()->route('jobs.index');
    }
}
