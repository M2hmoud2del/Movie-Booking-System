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
                        <!-- Example history card -->
                        <div class="col-md-6 col-lg-4 mb-4">
                            <div class="card history-card">
                                <img src="https://images.unsplash.com/photo-1594909122845-11baa439b7bf"
                                    class="movie-poster card-img-top" alt="Oppenheimer">
                                <div class="card-body">
                                    <h5 class="card-title">Oppenheimer</h5>
                                    <p class="card-text text-muted">Watched on: <strong>2025-08-20</strong></p>
                                    <p class="card-text"><span class="badge bg-danger">R</span> • Biography, Drama • 3h
                                    </p>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6 col-lg-4 mb-4">
                            <div class="card history-card">
                                <img src="https://images.unsplash.com/photo-1574375927938-d5a98e8ffe85"
                                    class="movie-poster card-img-top" alt="Dark Knight">
                                <div class="card-body">
                                    <h5 class="card-title">The Dark Knight</h5>
                                    <p class="card-text text-muted">Watched on: <strong>2025-07-10</strong></p>
                                    <p class="card-text"><span class="badge bg-warning text-dark">PG-13</span> • Action,
                                        Crime • 2h 32m</p>
                                </div>
                            </div>
                        </div>

                        <!-- More history items ... -->
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    @include('user/layouts/script')
</body>

</html>