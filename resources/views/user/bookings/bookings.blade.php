<!DOCTYPE html>
<html lang="en">

<head>
    
    @include('user/layouts/head')
    <link rel="stylesheet" href="{{ asset('user/assets/css/main.css') }}">
    <title>CineMax - User Dashboard</title>
   
    <style>
        #Bookseide {
        background-color: var(--sidebar-hover)gc;
        color: white;
        border-left: 4px solid var(--sidebar-active);
        }
    </style>
</head>

<body>
    <!-- Navigation -->
    @include('user/layouts/navbar')
@if ($errors->any())
                    <div class="alert alert-danger">
                        @foreach ($errors->all() as $e)
                            <li>{{$e}}</li>
                        @endforeach
                    </div>
                @endif
    <div class="dashboard-container inline">
        <div class="row">
            <!-- Sidebar -->
            @include('user/layouts/sidebar')

            <!-- Main Content -->
            <div class="col-lg-10 col-md-9">
                <div class="main-content">
                    <form novalidate action="{{route('book.submit')}}" method="POST" id="booking-form">
                        @csrf
                    <div class="row">
                        <div class="col-lg-8">
                            <h4 class="section-title">Quick Booking</h4>
                            <div class="card">
                                <div class="card-body">
                                    <div class="row mb-4">
                                        <div class="col-md-6">
                                            <label  for="movie" class="form-label">Select Movie</label>
                                            <select class="form-select" id="movie" name="movie_id">
                                                <option selected>Choose a movie...</option>
                                                @foreach ($movies as $m)
                                                    <option value="{{$m->id}}">{{$m->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="mb-4">
                                        <label for="payment_method" class="form-label">Payment Method</label>
                                        <select class="form-select" id="payment_method" name="payment_method" required>
                                            <option selected disabled>Choose a payment method...</option>
                                            <option value="cash">Cash</option>
                                            <option value="credit_card">Credit Card</option>
                                            <option value="wallet">Wallet</option>
                                        </select>
                                    </div>

                                    <div class="row mb-4">
                                        <div class="col-md-6">
                                            <label  for="time" class="form-label">Select Time</label>
                                            <select  name="showtime_id" class="form-select" id="time">
                                                <option selected>Choose time...</option>
                                                @foreach ($showtimes as $show)
                                                    <option value="{{$show->id}}">{{$show->start_time}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-md-6">
                                            <label name="screen_id" for="Screen" class="form-label">ٍScreen</label>
                                            <select class="form-select" id="Screen" name="screen_id">
                                                <option selected>Select screen</option>
                                                @foreach ($screenids as $screen)
                                                    <option value="{{$screen->id}}">{{$screen->screen_name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                        
                                    <!-- Seat Selection -->
                                    <div class="mb-4">
                                        <h5 class="mb-3">Select Seats</h5>
                                        <div class="screen mb-3 text-center">SCREEN</div>

                                        <div id="seat-map" class="text-center seat-map">
                                            <!-- This would be generated dynamically in a real app -->
                                            
                                        </div>
                                    </div>
                                     <input type="hidden" name="selected_seats" id="selected_seats_input">

                                    <div class="text-center">
                                        <button class="btn btn-lg btn-danger">Proceed to Payment</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        </form>
                        <!-- Rewards Section -->
                        <div class="col-lg-4">
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
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    @include('user/layouts/script')
    @include('user/bookings/seatsmake')
</body>

</html>