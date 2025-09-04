<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function index()
    {
        $payments = Booking::with('user')
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        $totalRevenue = Booking::where('status', 'completed')->sum('amount');
        $successfulPayments = Booking::where('status', 'completed')->count();
        $failedPayments = Booking::where('status', 'failed')->count();

        return view('admin.payments.index', compact(
            'payments',
            'totalRevenue',
            'successfulPayments',
            'failedPayments'
        ));
    }

    public function updateStatus(Request $request, $id)
    {
        $validated = $request->validate([
            'status' => 'required|in:pending,completed,failed',
        ]);

        $payment = Booking::findOrFail($id);
        $payment->update(['status' => $validated['status']]);

        return redirect()
            ->back()
            ->with('success', 'Payment status updated successfully!');
    }
}
