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
                    <!-- Slideshow Section - Dynamic from Database -->
                    
                    <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-inner">
                            @foreach($movies->take(3) as $index => $movie)
                            <div class="carousel-item {{ $index == 0 ? 'active' : '' }}">
                                <img src="{{ $movie->poster ? asset('uploads/movies' . $movie->poster) : 'https://images.unsplash.com/photo-1635805737707-575885ab0820?ixlib=rb-4.0.3' }}"
                                    class="d-block w-100" alt="{{ $movie->name }}" style="object-fit: cover;">
                                <div class="carousel-caption d-none d-md-block">
                                    <h5>{{ $movie->name }}</h5>
                                    <p>{{ $movie->genre }} | {{ floor($movie->duration / 60) }}h {{ $movie->duration % 60 }}m</p>
                                    @if($movie->rating)
                                    <span class="badge bg-warning text-dark">{{ $movie->rating }}/10</span>
                                    @endif
                                </div>
                            </div>
                            @endforeach
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
                    

                    <!-- Movies Section - Dynamic from Database -->
                    <div class="row mb-5 mt-4">
                        <div class="col-12">
                            <h3 class="mb-4">All Movies</h3>
                            <div class="row">
                                @foreach($movies as $movie)
                                <div class="col-xl-3 col-lg-4 col-md-6 mb-4">
                                    <div class="movie-card">
                                        <div class="position-relative">
                                            <img src="{{ $movie->poster ? asset('storage/posters/' . $movie->poster) : 'https://images.unsplash.com/photo-1635805737707-575885ab0820?ixlib=rb-4.0.3' }}"
                                                class="card-img-top movie-poster" alt="{{ $movie->name }}">
                                            
                                            
                                            @if($movie->rating)
                                            <span class="badge-rating">{{ $movie->rating }}/10</span>
                                            @endif
                                            
                                            <!-- Status Badge -->
                                            @if($movie->status == 'Now Showing')
                                            <span class="badge bg-success position-absolute top-0 start-0 m-2">{{ $movie->status }}</span>
                                            
                                            @else
                                            <span class="badge bg-secondary position-absolute top-0 start-0 m-2">{{ $movie->status }}</span>
                                            @endif
                                        </div>
                                        <div class="card-body">
                                            <h5 class="card-title">{{ $movie->name }}</h5>
                                            <p class="card-text text-muted">
                                                {{ $movie->genre }} | {{ floor($movie->duration / 60) }}h {{ $movie->duration % 60 }}m
                                            </p>
                                            
                                           
                                            
                                            <div class="d-flex justify-content-between align-items-center">
                                                <!-- Genre Badge -->
                                                <span class="badge bg-primary">{{ $movie->genre }}</span>
                                                
                                                @if($movie->status == 'Now Showing')
                                                <button class="showtime-btn btn-sm" onclick="viewShowtimes({{ $movie->id }})">Showtimes</button>
                                                @else
                                                <button class="btn btn-outline-secondary btn-sm" disabled>{{ $movie->status }}</button>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
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