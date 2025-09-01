<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Movie;
use App\Models\User;

class MovieController extends Controller
{
    public function index()
    {
        $movies = Movie::paginate(10);
        return view('admin.movies.index', compact('movies'));
    }

    public function create()
    {
        return view('admin.movies.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'genre' => 'required|string|max:255',
            'duration' => 'required|string|max:50',
            'release_date' => 'required|date',
            'rating' => 'required|string|max:10',
            'poster' => 'nullable|url',
            'director' => 'nullable|string|max:255',
            'cast' => 'nullable|string',
            'description' => 'nullable|string',
            'status' => 'required|string|in:Now Showing,Coming Soon,Ended',
        ]);

        Movie::create($request->all());

        return redirect()->route('admin.movies.index')->with('success', 'Movie created successfully.');
    }

    public function edit(Movie $movie)
    {
        return view('admin.movies.edit', compact('movie'));
    }

    public function show(Movie $movie)
    {
        return view('admin.movies.show', compact('movie'));
    }

    public function update(Request $request, Movie $movie)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'genre' => 'required|string|max:255',
            'duration' => 'required|string|max:50',
            'release_date' => 'required|date',
            'rating' => 'required|string|max:10',
            'poster' => 'nullable|url',
            'director' => 'nullable|string|max:255',
            'cast' => 'nullable|string',
            'description' => 'nullable|string',
            'status' => 'required|string|in:Now Showing,Coming Soon,Ended',
        ]);

        $movie->update($request->all());

        return redirect()->route('admin.movies.index')->with('success', 'Movie updated successfully.');
    }

    public function destroy(Movie $movie)
    {
        $movie->delete();

        return redirect()->route('admin.movies.index')->with('success', 'Movie deleted successfully.');
    }
}
