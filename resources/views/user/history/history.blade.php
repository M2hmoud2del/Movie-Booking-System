<!DOCTYPE html>
<html lang="en">

<head>
    
    @include('user/layouts/head')
    <link rel="stylesheet" href="{{ asset('user/assets/css/main.css') }}">
    <title>CineMax - History</title>
    
    <style>
        /* Page specific styling */
        #historyside {
            background-color: var(--sidebar-hover);
            color: white;
            border-left: 4px solid var(--sidebar-active);
        }

    </style>
</head>

<body>
    <!-- Navbar -->
    @include('user/layouts/navbar')

    <div class="dashboard-container inline">
        <div class="row">
            <!-- Sidebar -->
            @include('user/layouts/sidebar')

            <!-- Main Content -->
            <div class="col-lg-10 col-md-9">
                <div class="main-content p-4">
                    <h3 class="mb-4"><i class="fas fa-history me-2"></i> Watch History</h3>

                    <div class="row">
                        @foreach($bookings as $booking)
                            <div class="col-md-6 col-lg-4 mb-4">
                                <div class="card history-card">
                                    <img src="{{  asset($booking->showtime->movie->poster)  }}"
                                        class="movie-poster card-img-top" alt="{{ $booking->showtime->movie->name }}">
                                    <div class="card-body">
                                        <h5 class="card-title">{{ $booking->showtime->movie->name }}</h5>
                                        <p class="card-text text-muted">Watched on: <strong>{{ $booking->created_at->format('d M Y')}}</strong></p>
                                        <p class="card-text">
                                                <span class="badge bg-warning text-dark">{{ $booking->showtime->movie->rating }}/5</span> •

                                            {{ $booking->showtime->movie->genre }} • {{ floor($booking->showtime->movie->duration / 60) }}h {{ $booking->showtime->movie->duration % 60 }}m
                                        </p>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                          @if($bookings->isEmpty())
                            <div class="col-12">
                                <div class="text-center py-5">
                                    <i class="fas fa-history fa-3x text-muted mb-3"></i>
                                    <h4 class="text-muted">No Watch History Found</h4>
                                    <p class="text-muted">You haven't watched any movies yet. Start exploring our collection!</p>
                                    <a href="{{ route('user.dashboard') }}" class="btn btn-primary">Browse Movies</a>
                                </div>
                            </div>
                          @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    @include('user/layouts/script')
</body>

</html>