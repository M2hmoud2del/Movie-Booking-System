@extends('admin.layouts.app')

@section('title', 'Create New Customer - Movie Booking System')

@section('page-title', 'Create New Customer')

@section('header-actions')
<a href="{{ route('admin.customers.index') }}" class="btn-secondary">
    <i class="fas fa-arrow-left"></i> Back to Customers
</a>
@endsection


@section('content')
<div class="dashboard-section">
    <div class="section-header">
        <h2 class="section-title">Customer Information</h2>
    </div>
    @if ($errors->any())
    <div class="alert alert-danger" style="margin-bottom: 20px;">
        <ul style="margin: 0; padding-left: 20px;">
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    <form action="{{ route('admin.customers.store') }}" method="POST">
        @csrf

        <div class="form-group" style="margin-bottom: 20px;">
            <label style="display: block; margin-bottom: 8px; color: var(--text-secondary);">Full Name *</label>
            <input type="text" name="name" value="{{ old('name') }}" style="width: 100%; padding: 12px; border-radius: 6px; 
               border: 1px solid rgba(255, 255, 255, 0.1); background: var(--secondary); 
               color: var(--text);">
        </div>

        <div class="form-row" style="display: flex; gap: 20px; margin-bottom: 20px;">
            <div class="form-group" style="flex: 1;">
                <label style="display: block; margin-bottom: 8px; color: var(--text-secondary);">Email Address *</label>
                <input type="email" name="email" value="{{ old('email') }}" style="width: 100%; padding: 12px; border-radius: 6px; 
                   border: 1px solid rgba(255, 255, 255, 0.1); background: var(--secondary); 
                   color: var(--text);">
            </div>

            <div class="form-group" style="flex: 1;">
                <label style="display: block; margin-bottom: 8px; color: var(--text-secondary);">Phone Number</label>
                <input type="tel" name="phone" value="{{ old('phone') }}" style="width: 100%; padding: 12px; border-radius: 6px; 
                   border: 1px solid rgba(255, 255, 255, 0.1); background: var(--secondary); 
                   color: var(--text);">
            </div>
        </div>

        <div class="form-row" style="display: flex; gap: 20px; margin-bottom: 20px;">
            <div class="form-group" style="flex: 1;">
                <label style="display: block; margin-bottom: 8px; color: var(--text-secondary);">Password *</label>
                <input type="password" name="password" style="width: 100%; padding: 12px; border-radius: 6px; 
                   border: 1px solid rgba(255, 255, 255, 0.1); background: var(--secondary); 
                   color: var(--text);">
            </div>

            <div class="form-group" style="flex: 1;">
                <label style="display: block; margin-bottom: 8px; color: var(--text-secondary);">Confirm Password *</label>
                <input type="password" name="password_confirmation" style="width: 100%; padding: 12px; border-radius: 6px; 
                   border: 1px solid rgba(255, 255, 255, 0.1); background: var(--secondary); 
                   color: var(--text);">
            </div>
        </div>

        <div class="form-actions" style="display: flex; gap: 15px; margin-top: 30px;">
            <button type="submit" class="btn-primary">
                <i class="fas fa-user-plus"></i> Create Customer
            </button>
            <button type="reset" class="btn-secondary">
                <i class="fas fa-times"></i> Reset Form
            </button>
        </div>
    </form>

</div>
@endsection

@push('styles')
<style>
    .btn-secondary {
        background: rgba(255, 255, 255, 0.1);
        color: var(--text);
        border: 1px solid rgba(255, 255, 255, 0.1);
        padding: 10px 20px;
        border-radius: 6px;
        cursor: pointer;
        font-weight: 600;
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        gap: 8px;
    }

    .btn-secondary:hover {
        background: rgba(255, 255, 255, 0.2);
    }

    .btn-primary {
        background: var(--accent);
        color: white;
        border: none;
        padding: 10px 20px;
        border-radius: 6px;
        cursor: pointer;
        font-weight: 600;
        display: inline-flex;
        align-items: center;
        gap: 8px;
    }

    .btn-primary:hover {
        background: #c40811;
    }
</style>
@endpush