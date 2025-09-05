<!DOCTYPE html>
<html lang="en">

<head>
    <title>CineMax - Showtimes</title>

    @include('user/layouts/head')
    <link rel="stylesheet" href="{{ asset('user/assets/css/main.css') }}">
    <style>
        #showseide {
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
                            
                                </div>
                                <p class="text-muted">Find showtimes for your favorite movies</p>
                            </div>
                        </div>

                        

                        

                        <div class="row">
                            <div class="col-12">
                                @foreach($showtimes->groupBy('movie_id') as $movieId => $movieShowtimes)
                                    @php
                                        $movie = $movieShowtimes->first()->movie;
                                    @endphp

                                    <div class="theater-card mb-4">
                                        <div class="theater-header">
                                            <h5 class="mb-0">{{ $movie->name }}</h5>
                                            <p class="text-muted mb-0">
                                                {{ $movie->genre ?? '' }} |
                                                {{ $movie->duration ?? '' }} |
                                                Rating: {{ $movie->rating ?? '' }}
                                            </p>
                                        </div>
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-md-3 mb-3">
                                                    @if($movie->poster)
                                                        <img src="{{ asset($movie->poster) }}"
                                                             class="img-fluid rounded"
                                                             alt="{{ $movie->name }}">
                                                    @else
                                                        <img src="{{ asset('user/assets/img/default-poster.jpg') }}"
                                                             class="img-fluid rounded"
                                                             alt="No Poster">
                                                    @endif
                                                </div>
                                                <div class="col-md-9">
                                                    @foreach($movieShowtimes->groupBy('screen_id') as $screenId => $screenShowtimes)
                                                    
                                                        <h6 class="mb-3"><span class="showtime-slot">
                                                                    Screen{{ $screenId?? 'Unknown Screen' }}
                                                                </span></h6>
                                                        <div class="showtime-slots mb-4">
                                                            @foreach($screenShowtimes as $showtime)
                                                                <span class="showtime-slot">
                                                                    {{ \Carbon\Carbon::parse($showtime->start_time)->format('h:i A') }}
                                                                </span>
                                                                <span class="badge bg-secondary ms-2">
                                                                    {{ $showtime->date }}
                                                                </span>
                                                                <span class="badge bg-success ms-2">
                                                                    ${{ $showtime->price }}
                                                                </span>
                                                            @endforeach
                                                        </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <!-- End Showtimes List -->

                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('user/layouts/script')
</body>
</html>
