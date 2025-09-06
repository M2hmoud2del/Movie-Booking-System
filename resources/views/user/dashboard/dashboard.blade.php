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

                    <div class="col-lg-9">
                            <h4 class="section-title">Your Rewards</h4>
                            <div class="card mb-4">
                                <div class="card-body text-center">
                                    <h5>Loyalty Points</h5>
                                    <h2 class="text-primary">{{$totalSpent*1.75}}</h2>
                                    <p>Earn more points for a free ticket</p>
                                    @php
                                    $prog=7000;
                                    $progress = ($totalSpent * 1.75)*100/$prog;
                                    if ($prog>($totalSpent * 1.75)){
                                    
                                    $remain=($prog-($totalSpent * 1.75));
                                }
                                else {
                                    $remain=0;
                                }
                                    @endphp
                                    <div class="progress">
                                        <div class="progress-bar bg-success" role="progressbar" style="width:{{ $progress}}%"
                                            aria-valuenow="{{$progress}} " aria-valuemin="0" aria-valuemax="{{$prog}}"></div>
                                    </div>
                                    <p class="small text-muted mt-2">{{$remain}} to next reward</p>
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
