<?php
namespace App\Http\Controllers;

use App\Models\Movie;
use App\Models\Booking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookingController extends Controller
{

    public function create(Movie $movie)
    {
        return view('booking.book', compact('movie'));
    }

    
    public function store(Request $request)
    {
        $request->validate([
            'movie_id' => 'required|exists:movies,id',
            'date' => 'required|date',
            'time' => 'required',
            'tickets' => 'required|integer|min:1|max:10',
        ]);

        Booking::create([
            'movie_id' => $request->movie_id,
            'user_id' => Auth::id(),
            'date' => $request->date,
            'time' => $request->time,
            'tickets' => $request->tickets,
        ]);

        return redirect()->route('movies.index')->with('success', 'Booking successful!');
    }
}
