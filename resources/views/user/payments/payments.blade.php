<!DOCTYPE html>
<html lang="en">

<head>
    
    @include('user/layouts/head')
    <link rel="stylesheet" href="{{ asset('user/assets/css/main.css') }}">
    <title>CineMax - Payments</title>
    <style>
        /* Highlight current page in sidebar */
        #paymentside {
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
                    <h3 class="mb-4"><i class="fas fa-wallet me-2"></i> Payment History</h3>

                    <div class="row">
                        <!-- Example payment card -->
                        <div class="col-md-6 col-lg-4 mb-4">
                            <div class="card history-card">
                                <div class="card-body">
                                    <h5 class="card-title"><i class="fas fa-film me-2"></i>Oppenheimer</h5>
                                    <p class="card-text text-muted">Payment Date: <strong>2025-08-20</strong></p>
                                    <p class="card-text">Amount: <strong>$12.00</strong></p>
                                    <span class="badge bg-success"><i class="fas fa-check-circle me-1"></i> Paid</span>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6 col-lg-4 mb-4">
                            <div class="card history-card">
                                <div class="card-body">
                                    <h5 class="card-title"><i class="fas fa-film me-2"></i>Barbie</h5>
                                    <p class="card-text text-muted">Payment Date: <strong>2025-08-18</strong></p>
                                    <p class="card-text">Amount: <strong>$10.00</strong></p>
                                    <span class="badge bg-danger"><i class="fas fa-times-circle me-1"></i> Failed</span>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6 col-lg-4 mb-4">
                            <div class="card history-card">
                                <div class="card-body">
                                    <h5 class="card-title"><i class="fas fa-film me-2"></i>Mission Impossible</h5>
                                    <p class="card-text text-muted">Payment Date: <strong>2025-08-15</strong></p>
                                    <p class="card-text">Amount: <strong>$15.00</strong></p>
                                    <span class="badge bg-success"><i class="fas fa-check-circle me-1"></i> Paid</span>
                                </div>
                            </div>
                        </div>
                        <!-- Add more payment cards as needed -->
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    @include('user/layouts/script')
</body>

</html>
