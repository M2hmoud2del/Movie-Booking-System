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
                                                <option>Spider-Man: Across the Universe</option>
                                                <option>Oppenheimer</option>
                                                <option>Barbie: Dream Adventure</option>
                                                <option>The Dark Knight</option>
                                            </select>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="date" class="form-label">Select Date</label>
                                            <input type="date" class="form-control" id="date">
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
                                            <label for="tickets" class="form-label">Number of Tickets</label>
                                            <select class="form-select" id="tickets">
                                                <option selected>Select quantity...</option>
                                                <option>1</option>
                                                <option>2</option>
                                                <option>3</option>
                                                <option>4</option>
                                                <option>5</option>
                                            </select>
                                        </div>
                                    </div>

                                    <!-- Seat Selection -->
                                    <div class="mb-4">
                                        <h5 class="mb-3">Select Seats</h5>
                                        <div class="screen mb-3 text-center">SCREEN</div>

                                        <div class="text-center seat-map">
                                            <!-- This would be generated dynamically in a real app -->
                                            <div class="d-flex justify-content-center flex-wrap mb-3">
                                                <div class="seat"><i class="bi bi-person-fill-add"></i></div>
                                                <div class="seat"><i class="bi bi-person-fill-add"></i></div>
                                                <div class="seat occupied"><i class="bi bi-person-check-fill"></i>
                                                </div>
                                                <div class="seat occupied"><i class="bi bi-person-check-fill"></i>
                                                </div>
                                                <div class="seat"><i class="bi bi-person-fill-add"></i></div>
                                                <div class="seat"><i class="bi bi-person-fill-add"></i></div>
                                            </div>
                                            <div class="d-flex justify-content-center flex-wrap mb-3">
                                                <div class="seat"><i class="bi bi-person-fill-add"></i></div>
                                                <div class="seat"><i class="bi bi-person-fill-add"></i></div>
                                                <div class="seat"><i class="bi bi-person-fill-add"></i></div>
                                                <div class="seat occupied"><i class="bi bi-person-check-fill"></i></div>
                                                <div class="seat"><i class="bi bi-person-fill-add"></i></div>
                                                <div class="seat"><i class="bi bi-person-fill-add"></i></div>
                                            </div>
                                            <div class="d-flex justify-content-center flex-wrap mb-3">
                                                <div class="seat occupied"><i class="bi bi-person-check-fill"></i></div>
                                                <div class="seat occupied"><i class="bi bi-person-check-fill"></i></div>
                                                <div class="seat"><i class="bi bi-person-fill-add"></i></div>
                                                <div class="seat"><i class="bi bi-person-fill-add"></i></div>
                                                <div class="seat"><i class="bi bi-person-fill-add"></i></div>
                                                <div class="seat"><i class="bi bi-person-fill-add"></i></div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="text-center">
                                        <button class="btn btn-lg btn-danger">Proceed to Payment</button>
                                    </div>
                                </div>
                            </div>
                        </div>

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
</body>

</html>