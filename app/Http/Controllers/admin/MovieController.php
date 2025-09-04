<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Movie;

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
            'name' => 'required|string|max:100',
            'genre' => 'nullable|string|max:50',
            'duration' => 'required|integer|min:1',
            'release_date' => 'required|date',
            'rating' => 'nullable|numeric|min:0|max:5',
            'poster' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'director' => 'nullable|string|max:100',
            'cast' => 'nullable|string',
            'description' => 'nullable|string',
            'status' => 'nullable|string|in:now_showing,coming_soon,ended',
        ]);

        $data = $request->all();

        if ($request->hasFile('poster')) {
            $poster = $request->file('poster');
            $filename = time() . '_' . $poster->getClientOriginalName();
            $poster->move(public_path('uploads/movies'), $filename);
            $data['poster'] = 'uploads/movies/' . $filename;
        }

        Movie::create($data);

        return redirect()->route('admin.movies.index')->with('success', 'Movie created successfully.');
    }

    public function edit(Movie $movie)
    {
        return view('admin.movies.edit', compact('movie'));
    }

    public function update(Request $request, Movie $movie)
    {
        $request->validate([
            'name' => 'required|string|max:100',
            'genre' => 'nullable|string|max:50',
            'duration' => 'required|integer|min:1',
            'release_date' => 'required|date',
            'rating' => 'nullable|numeric|min:0|max:5',
            'poster' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'director' => 'nullable|string|max:100',
            'cast' => 'nullable|string',
            'description' => 'nullable|string',
            'status' => 'nullable|string',
        ]);

        $data = $request->all();

        if ($request->hasFile('poster')) {
            if ($movie->poster && file_exists(public_path($movie->poster))) {
                unlink(public_path($movie->poster));
            }

            $poster = $request->file('poster');
            $filename = time() . '_' . $poster->getClientOriginalName();
            $poster->move(public_path('uploads/movies'), $filename);
            $data['poster'] = 'uploads/movies/' . $filename;
        }

        $movie->update($data);

        return redirect()->route('admin.movies.index')->with('success', 'Movie updated successfully.');
    }

    public function show(Movie $movie)
    {
        return view('admin.movies.show', compact('movie'));
    }

    public function destroy(Movie $movie)
    {
        if ($movie->poster && file_exists(public_path($movie->poster))) {
            unlink(public_path($movie->poster));
        }

        $movie->delete();

        return redirect()->route('admin.movies.index')->with('success', 'Movie deleted successfully.');
    }
}
