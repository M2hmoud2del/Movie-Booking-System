<!DOCTYPE html>
<html lang="en">

<head>
    
    <title>CineMax - User Dashboard</title>
    
    @include('user/layouts/head')
    <link rel="stylesheet" href="{{ asset('user/assets/css/main.css') }}">
    <style>
        #dashseide {
        background-color: var(--sidebar-hover)gc;
        color: white;
        border-left: 4px solid var(--sidebar-active);
        }
    </style>
</head>

<body>
    <!-- Navigation -->
    
    @include('user/layouts/navbar')
    

    <!-- Dashboard Content -->
    <div class="dashboard-container inline">
        <div class="row">
            <!-- Sidebar -->
            
        @include('user/layouts/sidebar')

            <!-- Main Content -->
            <div class="col-lg-10 col-md-9">
                <div class="main-content">
                    <!-- Welcome Section -->
                    <div class="row mb-4">
                        <div class="col-md-12">
                            <div class="d-flex justify-content-between align-items-center">
                                <h3>Welcome back, Sarah!</h3>
                                <button class="custom-btn">
                                    <i class="fas fa-ticket-alt me-2"></i>Book Tickets
                                </button>
                            </div>
                            <p class="text-muted">Here's what's happening at your cinema today.</p>
                        </div>
                    </div>

                    <!-- Stats Section -->
                    <div class="row mb-5">
                        <div class="col-md-3 col-sm-6 mb-4">
                            <div class="stat-card">
                                <div class="icon bg-danger">
                                    <i class="fas fa-ticket-alt text-white"></i>
                                </div>
                                <h5>Bookings</h5>
                                <h3>12</h3>
                                <p class="text-muted">+2 from last week</p>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6 mb-4">
                            <div class="stat-card">
                                <div class="icon bg-info">
                                    <i class="fas fa-film text-white"></i>
                                </div>
                                <h5>Movies Watched</h5>
                                <h3>24</h3>
                                <p class="text-muted">+4 from last month</p>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6 mb-4">
                            <div class="stat-card">
                                <div class="icon bg-warning">
                                    <i class="fas fa-star text-white"></i>
                                </div>
                                <h5>Loyalty Points</h5>
                                <h3>1,250</h3>
                                <p class="text-muted">Earn 250 more for free ticket</p>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6 mb-4">
                            <div class="stat-card">
                                <div class="icon bg-success">
                                    <i class="fas fa-wallet text-white"></i>
                                </div>
                                <h5>Total Spent</h5>
                                <h3>$348</h3>
                                <p class="text-muted">$48 this month</p>
                            </div>
                        </div>
                    </div>

                    

                    <!-- Upcoming Bookings -->
                    <div class="row mb-5">
                        <div class="col-12">
                            <h4 class="section-title">Upcoming Bookings</h4>
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead class="table-light">
                                        <tr>
                                            <th>Movie</th>
                                            <th>Date & Time</th>
                                            <th>Theater</th>
                                            <th>Seats</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <img src="https://images.unsplash.com/photo-1635805737707-575885ab0820?ixlib=rb-4.0.3"
                                                        width="40" height="50" class="rounded me-3"
                                                        style="object-fit: cover;">
                                                    <div>Spider-Man: Across the Universe</div>
                                                </div>
                                            </td>
                                            <td>Today, 7:30 PM</td>
                                            <td>Screen 5</td>
                                            <td>E12, E13</td>
                                            <td>
                                                <button class="btn btn-sm btn-outline-primary">View Ticket</button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <img src="https://images.unsplash.com/photo-1594909122845-11baa439b7bf?ixlib=rb-4.0.3"
                                                        width="40" height="50" class="rounded me-3"
                                                        style="object-fit: cover;">
                                                    <div>Oppenheimer</div>
                                                </div>
                                            </td>
                                            <td>Tomorrow, 6:00 PM</td>
                                            <td>Screen 2</td>
                                            <td>H7, H8</td>
                                            <td>
                                                <button class="btn btn-sm btn-outline-primary">View Ticket</button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <img src="https://images.unsplash.com/photo-1574375927938-d5a98e8ffe85?ixlib=rb-4.0.3"
                                                        width="40" height="50" class="rounded me-3"
                                                        style="object-fit: cover;">
                                                    <div>The Dark Knight</div>
                                                </div>
                                            </td>
                                            <td>Aug 15, 4:45 PM</td>
                                            <td>Screen 3</td>
                                            <td>F15, F16</td>
                                            <td>
                                                <button class="btn btn-sm btn-outline-primary">View Ticket</button>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <!-- Quick Booking -->
                    
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    
    @include('user/layouts/script')
</body>
