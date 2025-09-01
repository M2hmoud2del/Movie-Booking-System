@extends('admin.layouts.app')

@section('title', 'Edit Customer - Movie Booking System')

@section('header')
<div class="header mb-4">
    <h1 class="page-title">Edit Customer</h1>
</div>
@endsection

@section('content')
<div class="dashboard-section p-4 rounded shadow" style="width:100%; max-width:600px; background-color:#282a36;">
    <form action="{{ route('admin.customers.update', $customer->id) }}" method="POST" class="d-flex flex-column gap-3">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label>Name</label>
            <input type="text" name="name" class="form-control" value="{{ old('name', $customer->name) }}" required>
        </div>

        <div class="form-group">
            <label>Email</label>
            <input type="email" name="email" class="form-control" value="{{ old('email', $customer->email) }}" required>
        </div>

        <div class="form-group">
            <label>Phone</label>
            <input type="text" name="phone" class="form-control" value="{{ old('phone', $customer->phone) }}">
        </div>

        <div class="form-group">
            <label>Password (leave blank to keep current)</label>
            <input type="password" name="password" class="form-control">
        </div>

        <button type="submit" class="btn-primary"><i class="fas fa-edit"></i> Update Customer</button>
        <a href="{{ route('admin.customers.index') }}" class="btn btn-secondary mt-2">Cancel</a>
    </form>
</div>
@endsection

@push('styles')
<style>
    .btn-primary {
        display: inline-flex;
        align-items: center;
        gap: 5px;
        padding: 8px 14px;
        background-color: #10b981;
        color: #fff;
        border: none;
        border-radius: 6px;
        font-weight: 600;
        cursor: pointer;
        transition: background 0.3s;
    }

    .btn-primary:hover {
        background-color: #0f9a70;
        color: #fff;
    }

    .form-control {
        border-radius: 6px;
        padding: 8px 12px;
        border: 1px solid #ccc;
    }
</style>
@endpush