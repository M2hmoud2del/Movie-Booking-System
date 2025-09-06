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

    // When user picks a movie show its times
    movieSelect.addEventListener('change', function() {
        const movieId = this.value;
        timeSelect.innerHTML = '<option selected>Choose time...</option>';

        const movieShowtimes = filteredShowtimes.filter(s => s.movie_id == movieId);
        movieShowtimes.forEach(s => {
            const option = document.createElement('option');
            option.value = s.id; 
            option.textContent = s.start_time;
            timeSelect.appendChild(option);
        });
    });

    
    renderSeats(screenId, null);
});


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