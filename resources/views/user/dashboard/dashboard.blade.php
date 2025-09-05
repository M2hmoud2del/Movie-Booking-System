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
                                <h3>Welcome back, {{Auth::user()->name}}!</h3>
                                <button class="custom-btn">
                                    
                                    <a style="text-decoration: none;"  href="{{route('user.booking')}}"><i style="color: white" class="fas fa-ticket-alt me-2"></i><p style="display: inline ;color: white">Book Tickets</p></a>
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
                                <h3>{{$numbookings}} times</h3>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6 mb-4">
                            <div class="stat-card">
                                <div class="icon bg-warning">
                                    <i class="fas fa-star text-white"></i>
                                </div>
                                <h5>Loyalty Points</h5>
                                <h3>{{$totalSpent*1.75}}</h3>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6 mb-4">
                            <div class="stat-card">
                                <div class="icon bg-success">
                                    <i class="fas fa-wallet text-white"></i>
                                </div>
                                <h5>Total Spent</h5>
                                <h3>${{$totalSpent}}</h3>
                            </div>
                        </div>
                    </div>

                    

                    <!-- Upcoming Bookings -->
                    <div class="row mb-5">
                        <div class="col-12">
                            <h4 class="section-title">Top movies</h4>
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
