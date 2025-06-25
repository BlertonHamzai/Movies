<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MovieController extends Controller
{
    // Shfaq listën e filmave
    public function index()
    {
        $movies = Movie::all();
        $isAdmin = false;

        if (Auth::check()) {
            $user = Auth::user();
            if ($user && $user->role === 'admin') {
                $isAdmin = true;
            }
        }

        return view('movies.index', compact('movies', 'isAdmin'));
    }

    // Shfaq formën për shtimin e filmit
    public function create()
    {
        return view('movies.create');
    }

    // Ruaj një film të ri
    public function store(Request $request)
    {
        $request->validate([
            'movie_name' => 'required|string|max:255',
            'movie_desc' => 'nullable|string',
            'movie_quality' => 'nullable|string|max:50',
            'movie_rating' => 'nullable|numeric|min:0|max:10',
            'movie_image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $data = $request->all();

        if ($request->hasFile('movie_image')) {
            $imageName = time().'.'.$request->movie_image->extension();
            $request->movie_image->move(public_path('images/movies'), $imageName);
            $data['movie_image'] = $imageName;
        }

        Movie::create($data);

        return redirect()->route('movies.index')->with('success', 'Movie created successfully.');
    }

    // Shfaq një film të veçantë
    public function show(string $id)
    {
        $movie = Movie::findOrFail($id);
        return view('movies.show', compact('movie'));
    }

    // Shfaq formën për editim
    public function edit(string $id)
    {
        $movie = Movie::findOrFail($id);
        return view('movies.edit', compact('movie'));
    }

    // Përditëso një film ekzistues
    public function update(Request $request, string $id)
    {
        $request->validate([
            'movie_name' => 'required|string|max:255',
            'movie_desc' => 'nullable|string',
            'movie_quality' => 'nullable|string|max:50',
            'movie_rating' => 'nullable|numeric|min:0|max:10',
        ]);

        $movie = Movie::findOrFail($id);
        $movie->update($request->all());

        return redirect()->route('movies.index')->with('success', 'Movie successfully updated.');
    }

    // Fshij një film
    public function destroy(string $id)
    {
        $movie = Movie::findOrFail($id);
        $movie->delete();

        return redirect()->route('movies.index')->with('success', 'Movie successfully deleted.');
    }
}