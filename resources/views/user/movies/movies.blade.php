<!DOCTYPE html>
<html lang="en">

<head>
    
    <title>CineMax - User Movies</title>
    
    @include('user/layouts/head')
    <link rel="stylesheet" href="{{ asset('user/assets/css/main.css') }}">
    <style>
        /* Existing styles */
        #moviesseide {
            background-color: var(--sidebar-hover);
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
                    <!-- Now Showing Section with Slideshow -->
                    <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img src="https://images.unsplash.com/photo-1635805737707-575885ab0820?ixlib=rb-4.0.3"
                                    class="d-block w-100" alt="First slide">
                                <div class="carousel-caption d-none d-md-block">
                                    <h5>First slide label</h5>
                                    <p>Some representative placeholder content for the first slide.</p>
                                </div>
                            </div>
                            <div class="carousel-item">
                                <img src="https://images.unsplash.com/photo-1594909122845-11baa439b7bf?ixlib=rb-4.0.3"
                                    class="d-block w-100" alt="Second slide">
                                <div class="carousel-caption d-none d-md-block">
                                    <h5>Second slide label</h5>
                                    <p>Some representative placeholder content for the second slide.</p>
                                </div>
                            </div>
                            <div class="carousel-item">
                                <img src="https://images.unsplash.com/photo-1536440136628-849c177e76a1?ixlib=rb-4.0.3"
                                    class="d-block w-100" alt="Third slide">
                                <div class="carousel-caption d-none d-md-block">
                                    <h5>Third slide label</h5>
                                    <p>Some representative placeholder content for the third slide.</p>
                                </div>
                            </div>
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions"
                            data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions"
                            data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>

                    <!-- Rest of the content remains the same -->
                    <div class="row mb-5">
                        <div class="col-12">
                            <div class="row">
                                <!-- Movie 1 -->
                                <div class="col-xl-3 col-lg-4 col-md-6 mb-4">
                                    <div class="movie-card">
                                        <div class="position-relative">
                                            <img src="https://images.unsplash.com/photo-1635805737707-575885ab0820?ixlib=rb-4.0.3"
                                                class="card-img-top movie-poster" alt="Movie Poster">
                                            <span class="badge-rating">8.5/10</span>
                                        </div>
                                        <div class="card-body">
                                            <h5 class="card-title">Spider-Man: Across the Universe</h5>
                                            <p class="card-text text-muted">Action, Adventure | 2h 20m</p>
                                            <div class="d-flex justify-content-between align-items-center">
                                                <span class="badge bg-warning text-dark">PG-13</span>
                                                <button class="showtime-btn btn-sm">Showtimes</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Movie 2 -->
                                <div class="col-xl-3 col-lg-4 col-md-6 mb-4">
                                    <div class="movie-card">
                                        <div class="position-relative">
                                            <img src="https://images.unsplash.com/photo-1594909122845-11baa439b7bf?ixlib=rb-4.0.3"
                                                class="card-img-top movie-poster" alt="Movie Poster">
                                            <span class="badge-rating">9.2/10</span>
                                        </div>
                                        <div class="card-body">
                                            <h5 class="card-title">Oppenheimer</h5>
                                            <p class="card-text text-muted">Biography, Drama | 3h 00m</p>
                                            <div class="d-flex justify-content-between align-items-center">
                                                <span class="badge bg-danger">R</span>
                                                <button class="showtime-btn btn-sm">Showtimes</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Movie 3 -->
                                <div class="col-xl-3 col-lg-4 col-md-6 mb-4">
                                    <div class="movie-card">
                                        <div class="position-relative">
                                            <img src="https://images.unsplash.com/photo-1536440136628-849c177e76a1?ixlib=rb-4.0.3"
                                                class="card-img-top movie-poster" alt="Movie Poster">
                                            <span class="badge-rating">7.8/10</span>
                                        </div>
                                        <div class="card-body">
                                            <h5 class="card-title">Barbie: Dream Adventure</h5>
                                            <p class="card-text text-muted">Comedy, Fantasy | 1h 54m</p>
                                            <div class="d-flex justify-content-between align-items-center">
                                                <span class="badge bg-success">PG</span>
                                                <button class="showtime-btn btn-sm">Showtimes</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Movie 4 -->
                                <div class="col-xl-3 col-lg-4 col-md-6 mb-4">
                                    <div class="movie-card">
                                        <div class="position-relative">
                                            <img src="https://images.unsplash.com/photo-1574375927938-d5a98e8ffe85?ixlib=rb-4.0.3"
                                                class="card-img-top movie-poster" alt="Movie Poster">
                                            <span class="badge-rating">8.1/10</span>
                                        </div>
                                        <div class="card-body">
                                            <h5 class="card-title">The Dark Knight</h5>
                                            <p class="card-text text-muted">Action, Crime | 2h 32m</p>
                                            <div class="d-flex justify-content-between align-items-center">
                                                <span class="badge bg-warning text-dark">PG-13</span>
                                                <button class="showtime-btn btn-sm">Showtimes</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Additional rows remain unchanged -->
                </div>
            </div>
        </div>
    </div>

   @include('user/layouts/script')
</body>
</html>