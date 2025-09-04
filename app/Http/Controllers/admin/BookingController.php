<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Booking;
use App\Models\BookedSeat;
use App\Models\Movie;
use App\Models\User;
use App\Models\Seat;
use App\Models\Showtime;
use Illuminate\Support\Facades\DB;
use App\Traits\LogsActivity;
use Illuminate\Support\Facades\Validator;

class BookingController extends Controller
{
    use LogsActivity;

    public function index()
    {
        $this->logActivity('View', 'Bookings', 'Viewed all bookings');

        $bookings = Booking::with('bookedSeats.seat', 'user', 'showtime.movie')->orderBy('created_at', 'desc')->paginate(10);


        $movies = $bookings->pluck('showtime.movie.title')->unique();


        return view('admin.bookings.index', compact('bookings', 'movies'));
    }


    public function create()
    {

        $users = User::all();
        $movies = Movie::all();
        $showtimes = Showtime::with('movie')->get();
        return view('admin.bookings.create', compact('users', 'movies', 'showtimes'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'showtime_id' => 'required|exists:showtimes,id',
            'amount' => 'required|numeric',
            'status' => 'required|string',
            'payment_method' => 'required|string',
        ]);

        Booking::create([
            'user_id' => $request->user_id,
            'showtime_id' => $request->showtime_id,
            'amount' => $request->amount,
            'status' => $request->status,
            'payment_method' => $request->payment_method,
        ]);
        $this->logActivity('Create', 'Bookings', "Created booking for user ID: {$request->user_id}");

        return redirect()->route('admin.bookings.index')->with('success', 'Booking created successfully.');
    }


    public function edit($id)
    {
        $this->logActivity('View', 'Bookings', 'Viewed edit booking form');
        $booking = Booking::with('user', 'showtime.movie', 'showtime.screen', 'bookedSeats.seat')->findOrFail($id);

        // Fetch the necessary data to populate the dropdowns in the form
        $users = User::all();
        $movies = Movie::all();
        $showtimes = Showtime::all(); // You need to load all showtimes to allow changing the showtime

        return view('admin.bookings.edit', compact('booking', 'users', 'movies', 'showtimes'));
    }


    public function show($id)
    {
        $this->logActivity('View', 'Bookings', 'Viewed booking details');
        $booking = Booking::with([
            'user',
            'showtime.movie',
            'showtime.screen',
            'bookedSeats.seat'
        ])->findOrFail($id);


        return view('admin.bookings.show', compact('booking'));
    }

    public function update(Request $request, $id)
    {
        $this->logActivity('Update', 'Bookings', "Updated booking ID: {$id}");
        $validator = Validator::make($request->all(), [
            'user_id' => 'required|exists:users,id',
            'showtime_id' => 'required|exists:showtimes,id',
            'amount' => 'required|numeric',
            'status' => 'required|string|max:20',
            'seats' => 'required|string',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        DB::transaction(function () use ($request, $id) {
            $booking = Booking::findOrFail($id);

            // First, update the booking record with the new data
            $booking->update([
                'user_id' => $request->user_id,
                'showtime_id' => $request->showtime_id,
                'amount' => $request->amount,
                'status' => $request->status,
            ]);

            // Now, handle the seats update.
            // Split the comma-separated string into an array of seat names.
            $seatNames = array_map('trim', explode(',', $request->seats));

            // Find the seat IDs based on the provided seat names.
            $seatIds = Seat::whereIn(DB::raw('CONCAT(seat_row, seat_number)'), $seatNames)
                ->pluck('id')
                ->toArray();

            // Delete all existing booked seats for this booking.
            $booking->bookedSeats()->delete();

            // Create new booked seat records with the updated seat IDs.
            foreach ($seatIds as $seatId) {
                BookedSeat::create([
                    'booking_id' => $booking->id,
                    'seat_id' => $seatId,
                ]);
            }
        });

        return redirect()->route('admin.bookings.index')->with('success', 'Booking updated successfully.');
    }

    public function destroy($id)
    {
        $booking = Booking::findOrFail($id);
        $booking->bookedSeats()->delete();
        $booking->delete();

        $this->logActivity('Delete', 'Bookings', "Deleted booking ID: {$id}");
        return redirect()->route('admin.bookings.index')->with('success', 'Booking deleted successfully.');
    }
}