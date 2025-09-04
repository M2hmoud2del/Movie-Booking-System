<!DOCTYPE html>
<html lang="en">

<head>
    @include('user/layouts/head')
    <link rel="stylesheet" href="{{ asset('user/assets/css/main.css') }}">
    <title>CineMax - Payments</title>
    <style>
        #paymentside {
            background-color: var(--sidebar-hover);
            color: white;
            border-left: 4px solid var(--sidebar-active);
        }
    </style>
</head>

<body>
    @include('user/layouts/navbar')

    <div class="dashboard-container inline">
        <div class="row">
            @include('user/layouts/sidebar')

            <div class="col-lg-10 col-md-9">
                <div class="main-content p-4">
                    <h3 class="mb-4"><i class="fas fa-wallet me-2"></i> Payment History</h3>

                    <div class="row">
                        @forelse ($bookings as $b)
                            <div class="col-md-6 col-lg-4 mb-4">
                                <div class="card history-card">
                                    <div class="card-body">
                                        <h5 class="card-title">
                                            <i class="fas fa-film me-2"></i>{{ $b->showtime->movie->name }}
                                        </h5>
                                        <p class="card-text text-muted">
                                            Payment Date:
                                            <strong>{{ $b->created_at->format('Y-m-d H:i') }}</strong>
                                        </p>
                                        <p class="card-text">
                                            Amount:
                                            <strong>${{ $b->amount }}</strong>
                                        </p>
                                        <p class="card-text">
                                            Method:
                                            <strong>{{ $b->payment_method }}</strong>
                                        </p>
                                        <span class="badge bg-{{ $b->status == 'Confirmed' ? 'success' : 'warning' }}">
                                            <i class="fas fa-check-circle me-1"></i> {{ ucfirst($b->status) }}
                                        </span>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <p class="text-muted">No payment history found.</p>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('user/layouts/script')
</body>
</html>
