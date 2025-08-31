
<!DOCTYPE html>
<html lang="en">

<head>

    <title>CineMax - Showtimes</title>
    
    @include('user/layouts/head')
    <link rel="stylesheet" href="{{ asset('user/assets/css/main.css') }}">
    <style>
        

        /* END SIDEBAR STYLES */


        #showseide {
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
    <div class="dashboard-container">
        <div class="row">
            <!-- Sidebar -->
            @include('user/layouts/sidebar')

            <!-- Main Content -->
            <div class="col-lg-10 col-md-9">
                <div class="main-content">
                    <!-- Showtimes Page -->
                    <div id="showtimes" class="page-content active">
                        <div class="row mb-4">
                            <div class="col-md-12">
                                <div class="d-flex justify-content-between align-items-center">
                                    <h3>Movie Showtimes</h3>
                                    <button class="custom-btn">
                                        <i class="fas fa-filter me-2"></i>Filter
                                    </button>
                                </div>
                                <p class="text-muted">Find showtimes for your favorite movies</p>
                            </div>
                        </div>

                        <!-- Date Selector -->
                        <div class="row mb-4">
                            <div class="col-12">
                                <div class="date-selector">
                                    <h5 class="mb-3">Select Date</h5>
                                    <div class="d-flex flex-wrap">
                                        <div class="date-btn active">Today</div>
                                        <div class="date-btn">Tomorrow</div>
                                        <div class="date-btn">Aug 15</div>
                                        <div class="date-btn">Aug 16</div>
                                        <div class="date-btn">Aug 17</div>
                                        <div class="date-btn">Aug 18</div>
                                        <div class="date-btn">Aug 19</div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Filters -->
                        <div class="row mb-4">
                            <div class="col-12">
                                <h5 class="mb-3">Filter by:</h5>
                                <div class="d-flex flex-wrap">
                                    <div class="filter-btn active">All Movies</div>
                                    <div class="filter-btn">Action</div>
                                    <div class="filter-btn">Drama</div>
                                    <div class="filter-btn">Comedy</div>
                                    <div class="filter-btn">IMAX</div>
                                    <div class="filter-btn">3D</div>
                                </div>
                            </div>
                        </div>

                        <!-- Showtimes List -->
                        <div class="row">
                            <div class="col-12">
                                <!-- Movie 1 -->
                                <div class="theater-card">
                                    <div class="theater-header">
                                        <h5 class="mb-0">Spider-Man: Across the Universe</h5>
                                        <p class="text-muted mb-0">Action, Adventure | 2h 20m | PG-13</p>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-3 mb-3">
                                                <img src="https://images.unsplash.com/photo-1635805737707-575885ab0820?ixlib=rb-4.0.3"
                                                    class="img-fluid rounded" alt="Movie Poster">
                                            </div>
                                            <div class="col-md-9">
                                                <h6 class="mb-3">CineMax Downtown</h6>
                                                <div class="showtime-slots mb-4">
                                                    <span class="showtime-slot">10:00 AM</span>
                                                    <span class="showtime-slot">1:30 PM</span>
                                                    <span class="showtime-slot">4:45 PM</span>
                                                    <span class="showtime-slot">7:30 PM</span>
                                                    <span class="showtime-slot">10:15 PM</span>
                                                </div>

                                                <h6 class="mb-3">CineMax Westside</h6>
                                                <div class="showtime-slots mb-4">
                                                    <span class="showtime-slot">10:30 AM</span>
                                                    <span class="showtime-slot">1:45 PM</span>
                                                    <span class="showtime-slot">5:00 PM</span>
                                                    <span class="showtime-slot">8:00 PM</span>
                                                    <span class="showtime-slot">10:45 PM</span>
                                                </div>

                                                <h6 class="mb-3">CineMax Eastend</h6>
                                                <div class="showtime-slots">
                                                    <span class="showtime-slot">11:00 AM</span>
                                                    <span class="showtime-slot">2:15 PM</span>
                                                    <span class="showtime-slot">5:30 PM</span>
                                                    <span class="showtime-slot">8:30 PM</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Movie 2 -->
                                <div class="theater-card">
                                    <div class="theater-header">
                                        <h5 class="mb-0">Oppenheimer</h5>
                                        <p class="text-muted mb-0">Biography, Drama | 3h 00m | R</p>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-3 mb-3">
                                                <img src="https://images.unsplash.com/photo-1594909122845-11baa439b7bf?ixlib=rb-4.0.3"
                                                    class="img-fluid rounded" alt="Movie Poster">
                                            </div>
                                            <div class="col-md-9">
                                                <h6 class="mb-3">CineMax Downtown</h6>
                                                <div class="showtime-slots mb-4">
                                                    <span class="showtime-slot">11:30 AM</span>
                                                    <span class="showtime-slot">3:30 PM</span>
                                                    <span class="showtime-slot">7:00 PM</span>
                                                </div>

                                                <h6 class="mb-3">CineMax Westside</h6>
                                                <div class="showtime-slots mb-4">
                                                    <span class="showtime-slot">12:00 PM</span>
                                                    <span class="showtime-slot">4:00 PM</span>
                                                    <span class="showtime-slot">7:30 PM</span>
                                                </div>

                                                <h6 class="mb-3">CineMax Eastend</h6>
                                                <div class="showtime-slots">
                                                    <span class="showtime-slot">12:30 PM</span>
                                                    <span class="showtime-slot">4:30 PM</span>
                                                    <span class="showtime-slot">8:00 PM</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Movie 3 -->
                                <div class="theater-card">
                                    <div class="theater-header">
                                        <h5 class="mb-0">Barbie: Dream Adventure</h5>
                                        <p class="text-muted mb-0">Comedy, Fantasy | 1h 54m | PG</p>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-3 mb-3">
                                                <img src="https://images.unsplash.com/photo-1536440136628-849c177e76a1?ixlib=rb-4.0.3"
                                                    class="img-fluid rounded" alt="Movie Poster">
                                            </div>
                                            <div class="col-md-9">
                                                <h6 class="mb-3">CineMax Downtown</h6>
                                                <div class="showtime-slots mb-4">
                                                    <span class="showtime-slot">10:15 AM</span>
                                                    <span class="showtime-slot">12:45 PM</span>
                                                    <span class="showtime-slot">3:15 PM</span>
                                                    <span class="showtime-slot">6:00 PM</span>
                                                    <span class="showtime-slot">8:45 PM</span>
                                                </div>

                                                <h6 class="mb-3">CineMax Westside</h6>
                                                <div class="showtime-slots">
                                                    <span class="showtime-slot">11:00 AM</span>
                                                    <span class="showtime-slot">1:30 PM</span>
                                                    <span class="showtime-slot">4:00 PM</span>
                                                    <span class="showtime-slot">6:45 PM</span>
                                                    <span class="showtime-slot">9:30 PM</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Movie 4 -->
                                <div class="theater-card">
                                    <div class="theater-header">
                                        <h5 class="mb-0">The Dark Knight</h5>
                                        <p class="text-muted mb-0">Action, Crime | 2h 32m | PG-13</p>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-3 mb-3">
                                                <img src="https://images.unsplash.com/photo-1574375927938-d5a98e8ffe85?ixlib=rb-4.0.3"
                                                    class="img-fluid rounded" alt="Movie Poster">
                                            </div>
                                            <div class="col-md-9">
                                                <h6 class="mb-3">CineMax Downtown</h6>
                                                <div class="showtime-slots mb-4">
                                                    <span class="showtime-slot">9:45 PM</span>
                                                </div>

                                                <h6 class="mb-3">CineMax Westside</h6>
                                                <div class="showtime-slots mb-4">
                                                    <span class="showtime-slot">10:30 PM</span>
                                                </div>

                                                <h6 class="mb-3">CineMax Eastend</h6>
                                                <div class="showtime-slots">
                                                    <span class="showtime-slot">11:00 PM</span>
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
        </div>
    </div>

    @include('user/layouts/script')
</body>

</html>