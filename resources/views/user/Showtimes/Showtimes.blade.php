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
                                                        <img src="{{ asset('storage/'.$movie->poster) }}"
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
                                                        <h6 class="mb-3">{{ $screenShowtimes->first()->screen->name ?? 'Unknown Screen' }}</h6>
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
