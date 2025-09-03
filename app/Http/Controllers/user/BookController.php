<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\BookedSeat;
use App\Models\Movie;
use App\Models\Screen;
use App\Models\Seat;
use App\Models\Booking;
use App\Models\Showtime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookController extends Controller
{
    //
    public function booking()
    {
        $screenids=Screen::get();
        $movies=Movie::get();
        $seats = Seat::
            orderBy('seat_row', 'asc')     // Sort alphabetically by row (A, B, C, …)
            ->orderBy('seat_number', 'asc')  // Then by number (1, 2, 3, …)
            ->get();
        $booked = BookedSeat::get();
        $showtime=Showtime::get();

        return view('user.bookings.bookings',compact('screenids', 'movies','seats', 'booked', 'showtime'));
    }
    public function submitBooking(Request $request)
    {
        $request->validate([
            'selected_seats' => 'required|string',
            'movie_id' => 'required|integer',
            'screen_id' => 'required|integer',
            'date' => 'required|date',
            'time' => 'required|string',
        ]);

        $seatIds = explode(',', $request->selected_seats); // convert string to array

        $booking = Booking::create([
            'user_id' => Auth::user()->id,
            'movie_id' => $request->movie_id,

            'showtime_id' => $request->time,
            'screen_id' => $request->screen_id
        ]);

        // Save booked seats
        foreach ($seatIds as $seatId) {
            BookedSeat::create([
                'booking_id' => $booking->id,
                'seat_id' => $seatId,
            ]);
        }

        return redirect()->route('user.booking')->with('success', 'Seats booked successfully!');
    }
}
