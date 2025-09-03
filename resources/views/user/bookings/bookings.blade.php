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

    <div class="dashboard-container inline">
        <div class="row">
            <!-- Sidebar -->
            @include('user/layouts/sidebar')

            <!-- Main Content -->
            <div class="col-lg-10 col-md-9">
                <div class="main-content">
                    <form action="{{route('book.submit')}}" method="POST" id="booking-form">
                        @csrf
                    <div class="row">
                        <div class="col-lg-8">
                            <h4 class="section-title">Quick Booking</h4>
                            <div class="card">
                                <div class="card-body">
                                    <div class="row mb-4">
                                        <div class="col-md-6">
                                            <label for="movie" class="form-label">Select Movie</label>
                                            <select class="form-select" id="movie">
                                                <option selected>Choose a movie...</option>
                                                @foreach ($movies as $m)
                                                    <option value="{{$m->id}}">{{$m->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="date" class="form-label">Select Date</label>
                                            <input type="date" class="form-control" id="date" 
                                                min="{{ \Carbon\Carbon::today()->toDateString() }}">
                                        </div>
                                    </div>
                                    <div class="row mb-4">
                                        <div class="col-md-6">
                                            <label for="time" class="form-label">Select Time</label>
                                            <select class="form-select" id="time">
                                                <option selected>Choose time...</option>
                                                <option>10:00 AM</option>
                                                <option>1:30 PM</option>
                                                <option>5:00 PM</option>
                                                <option>8:30 PM</option>
                                            </select>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="Screen" class="form-label">ٍScreen</label>
                                            <select class="form-select" id="Screen">
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
                                    <h2 class="text-primary">1,250</h2>
                                    <p>Earn 250 more points for a free ticket</p>
                                    <div class="progress">
                                        <div class="progress-bar bg-success" role="progressbar" style="width: 75%"
                                            aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <p class="small text-muted mt-2">75% to next reward</p>
                                </div>
                            </div>

                            <h4 class="section-title">Special Offers</h4>
                            <div class="card">
                                <div class="card-body">
                                    <div class="d-flex mb-3">
                                        <div class="bg-danger text-white p-2 rounded me-3">
                                            <i class="fas fa-ticket-alt fa-2x"></i>
                                        </div>
                                        <div>
                                            <h6>2-for-1 Tuesday</h6>
                                            <p class="small text-muted">Get 2 tickets for the price of 1 every Tuesday
                                            </p>
                                        </div>
                                    </div>
                                    <div class="d-flex mb-3">
                                        <div class="bg-primary text-white p-2 rounded me-3">
                                            <i class="fas fa-popcorn fa-2x"></i>
                                        </div>
                                        <div>
                                            <h6>Free Popcorn</h6>
                                            <p class="small text-muted">Free large popcorn with 3+ tickets</p>
                                        </div>
                                    </div>
                                    <div class="d-flex">
                                        <div class="bg-warning text-dark p-2 rounded me-3">
                                            <i class="fas fa-star fa-2x"></i>
                                        </div>
                                        <div>
                                            <h6>Student Discount</h6>
                                            <p class="small text-muted">20% off for students with valid ID</p>
                                        </div>
                                    </div>
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
    // All seats as JSON
    const seats = @json($seats);

    // Only the booked seat IDs
    const bookedSeats = @json($booked->pluck('seat_id'));

    const seatMapContainer = document.getElementById('seat-map');
    const screenSelect = document.getElementById('Screen');

    function renderSeats(screenId) {
        seatMapContainer.innerHTML = '';

        // Filter seats by selected screen
        const filteredSeats = seats.filter(s => s.screen_id == screenId);

        // Group seats by row
        const rows = {};
        filteredSeats.forEach(s => {
            if (!rows[s.seat_row]) rows[s.seat_row] = [];
            rows[s.seat_row].push(s);
        });

        // Render each row
        for (let row in rows) {
            const rowDiv = document.createElement('div');
            rowDiv.className = 'd-flex justify-content-center flex-wrap mb-3';

            rows[row].forEach(seat => {
                const seatDiv = document.createElement('div');
                seatDiv.className = 'seat';
                seatDiv.dataset.seatId = seat.id; 

                if (bookedSeats.includes(seat.id)) {
                    seatDiv.classList.add('occupied');  // Already booked
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

    // Render seats when screen changes
    screenSelect.addEventListener('change', function() {
        renderSeats(this.value);
    });


    document.getElementById('booking-form').addEventListener('submit', function(e) {
    // Find all selected seat divs
    const selectedSeats = Array.from(document.querySelectorAll('.seat.selected'))
        .map(seat => seat.dataset.seatId); // get their IDs

    if(selectedSeats.length === 0){
        e.preventDefault(); // prevent form submission
        alert('Please select at least one seat!');
        return;
    }

    // Put the selected seat IDs in the hidden input as comma-separated
    document.getElementById('selected_seats_input').value = selectedSeats.join(',');
});
   
</script>

</body>

</html>