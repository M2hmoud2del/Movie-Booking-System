<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Http\Requests\user\BookRequest;
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
        $booked = BookedSeat::select('showtime_id', 'seat_id')->get();
        $totalSpent = Booking::where('user_id', Auth::id())->sum('amount');
        $showtimes=Showtime::get();

        return view('user.bookings.bookings',compact('screenids', 'movies','seats', 'booked', 'showtimes', 'totalSpent'));
    }
    public function submitBooking(BookRequest $request)
    {
        $data= $request->validated();

        $seatIds = explode(',', $request->selected_seats); // convert string to array
        $showtime = Showtime::findOrFail($request->showtime_id);

        // ✅ Calculate total amount (price * number of seats)
        $totalAmount = count($seatIds) * $showtime->price;
        $booking = Booking::create([
            'user_id' => Auth::user()->id,
            'movie_id' => $request->movie_id,
            'showtime_id' => $request->showtime_id,  // ✅ this is showtime_id
            'screen_id' => $request->screen_id,
            'amount'=> $totalAmount,
            'payment_method' => $request->payment_method,


        ]);
        
        // Save booked seats
        foreach ($seatIds as $seatId) {
            BookedSeat::create([
                'booking_id' => $booking->id,
                'seat_id' => $seatId,
                'showtime_id' => $request->showtime_id, // ✅ add this
            ]); 
        }

        return redirect()->route('user.dashboard')->with('success', 'Seats booked successfully!');
    }
}
