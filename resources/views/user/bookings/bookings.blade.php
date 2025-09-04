<!DOCTYPE html>
<html lang="en">

<head>
    
    @include('user/layouts/head')
    <link rel="stylesheet" href="{{ asset('user/assets/css/main.css') }}">
    <title>CineMax - User Dashboard</title>
   
    <style>
        #Bookseide {
        background-color: var(--sidebar-hover)gc;
        color: white;
        border-left: 4px solid var(--sidebar-active);
        }
    </style>
</head>

<body>
    <!-- Navigation -->
    @include('user/layouts/navbar')
@if ($errors->any())
                    <div class="alert alert-danger">
                        @foreach ($errors->all() as $e)
                            <li>{{$e}}</li>
                        @endforeach
                    </div>
                @endif
    <div class="dashboard-container inline">
        <div class="row">
            <!-- Sidebar -->
            @include('user/layouts/sidebar')

            <!-- Main Content -->
            <div class="col-lg-10 col-md-9">
                <div class="main-content">
                    <form novalidate action="{{route('book.submit')}}" method="POST" id="booking-form">
                        @csrf
                    <div class="row">
                        <div class="col-lg-8">
                            <h4 class="section-title">Quick Booking</h4>
                            <div class="card">
                                <div class="card-body">
                                    <div class="row mb-4">
                                        <div class="col-md-6">
                                            <label  for="movie" class="form-label">Select Movie</label>
                                            <select class="form-select" id="movie" name="movie_id">
                                                <option selected>Choose a movie...</option>
                                                @foreach ($movies as $m)
                                                    <option value="{{$m->id}}">{{$m->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="mb-4">
                                        <label for="payment_method" class="form-label">Payment Method</label>
                                        <select class="form-select" id="payment_method" name="payment_method" required>
                                            <option selected disabled>Choose a payment method...</option>
                                            <option value="cash">Cash</option>
                                            <option value="credit_card">Credit Card</option>
                                            <option value="wallet">Wallet</option>
                                        </select>
                                    </div>

                                    <div class="row mb-4">
                                        <div class="col-md-6">
                                            <label  for="time" class="form-label">Select Time</label>
                                            <select  name="showtime_id" class="form-select" id="time">
                                                <option selected>Choose time...</option>
                                                @foreach ($showtimes as $show)
                                                    <option value="{{$show->id}}">{{$show->start_time}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-md-6">
                                            <label name="screen_id" for="Screen" class="form-label">ٍScreen</label>
                                            <select class="form-select" id="Screen" name="screen_id">
                                                <option selected>Select screen</option>
                                                @foreach ($screenids as $screen)
                                                    <option value="{{$screen->id}}">{{$screen->screen_name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                        
                                    <!-- Seat Selection -->
                                    <div class="mb-4">
                                        <h5 class="mb-3">Select Seats</h5>
                                        <div class="screen mb-3 text-center">SCREEN</div>

                                        <div id="seat-map" class="text-center seat-map">
                                            <!-- This would be generated dynamically in a real app -->
                                            
                                        </div>
                                    </div>
                                     <input type="hidden" name="selected_seats" id="selected_seats_input">

                                    <div class="text-center">
                                        <button class="btn btn-lg btn-danger">Proceed to Payment</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        </form>
                        <!-- Rewards Section -->
                        <div class="col-lg-4">
                            <h4 class="section-title">Your Rewards</h4>
                            <div class="card mb-4">
                                <div class="card-body text-center">
                                    <h5>Loyalty Points</h5>
                                    <h2 class="text-primary">{{$totalSpent*1.75}}</h2>
                                    <p>Earn more points for a free ticket</p>
                                    <div class="progress">
                                        <div class="progress-bar bg-success" role="progressbar" style="width: 75%"
                                            aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <p class="small text-muted mt-2">75% to next reward</p>
                                </div>
                            </div>

                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    @include('user/layouts/script')
<script>
const allShowtimes = @json($showtimes); // Each showtime: {id, movie_id, screen_id, start_time}
const allMovies = @json($movies);       // Movies table
const bookedSeats = @json($booked); // each = {showtime_id, seat_id}
const seats = @json($seats);            // All seats

const screenSelect = document.getElementById('Screen');
const movieSelect = document.getElementById('movie');
const timeSelect = document.getElementById('time');
const seatMapContainer = document.getElementById('seat-map');

function renderSeats(screenId, showtimeId) {
    seatMapContainer.innerHTML = '';
    if (!screenId) return;

    const filteredSeats = seats.filter(s => s.screen_id == screenId);

    const rows = {};
    filteredSeats.forEach(s => {
        if (!rows[s.seat_row]) rows[s.seat_row] = [];
        rows[s.seat_row].push(s);
    });

    // Get booked seats for this showtime
    const bookedForShowtime = bookedSeats
        .filter(b => b.showtime_id == showtimeId)
        .map(b => b.seat_id);

    for (let row in rows) {
        const rowDiv = document.createElement('div');
        rowDiv.className = 'd-flex justify-content-center flex-wrap mb-3';

        rows[row].forEach(seat => {
            const seatDiv = document.createElement('div');
            seatDiv.className = 'seat';
            seatDiv.dataset.seatId = seat.id;

            if (showtimeId && bookedForShowtime.includes(seat.id)) {
                seatDiv.classList.add('occupied');
                seatDiv.innerHTML = `<i class="bi bi-person-check-fill"></i>`;
            } else {
                seatDiv.innerHTML = `<i class="bi bi-person-fill-add"></i>`;
                seatDiv.addEventListener('click', () => seatDiv.classList.toggle('selected'));
            }

            rowDiv.appendChild(seatDiv);
        });

        seatMapContainer.appendChild(rowDiv);
    }
}


screenSelect.addEventListener('change', function() {
    const screenId = this.value;

    // Reset
    movieSelect.innerHTML = '<option selected>Choose a movie...</option>';
    timeSelect.innerHTML = '<option selected>Choose time...</option>';

    if (!screenId) return;

    // Get showtimes for this screen
    const filteredShowtimes = allShowtimes.filter(s => s.screen_id == screenId);

    // Unique movies from those showtimes
    const movieIds = [...new Set(filteredShowtimes.map(s => s.movie_id))];
    const filteredMovies = allMovies.filter(m => movieIds.includes(m.id));

    filteredMovies.forEach(m => {
        const option = document.createElement('option');
        option.value = m.id;
        option.textContent = m.name;
        movieSelect.appendChild(option);
    });

    // When user picks a movie, show its times
    movieSelect.addEventListener('change', function() {
        const movieId = this.value;
        timeSelect.innerHTML = '<option selected>Choose time...</option>';

        const movieShowtimes = filteredShowtimes.filter(s => s.movie_id == movieId);
        movieShowtimes.forEach(s => {
            const option = document.createElement('option');
            option.value = s.id; // Important: pass showtime_id
            option.textContent = s.start_time;
            timeSelect.appendChild(option);
        });
    });

    // Render seats immediately (without showtime yet)
    renderSeats(screenId, null);
});

// When time is chosen, re-render seats for that showtime
timeSelect.addEventListener('change', function() {
    const showtimeId = this.value;
    const screenId = screenSelect.value;
    renderSeats(screenId, showtimeId);
});

// Booking form handler
document.getElementById('booking-form').addEventListener('submit', function(e) {
    const selectedSeats = Array.from(document.querySelectorAll('.seat.selected'))
        .map(seat => seat.dataset.seatId);

    if (selectedSeats.length === 0) {
        e.preventDefault();
        alert('Please select at least one seat!');
        return;
    }

    document.getElementById('selected_seats_input').value = selectedSeats.join(',');
});

</script>
</body>

</html>