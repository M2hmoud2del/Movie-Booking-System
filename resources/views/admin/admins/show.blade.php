@extends('admin.layouts.app')

@section('title', 'Admin Details - Movie Booking System')

@section('header')
<div class="header mb-4">
    <h1 class="page-title">Admin Details</h1>
</div>
@endsection

@section('content')
<div class="dashboard-section p-4 rounded shadow" style="width:100%; max-width:600px; background-color:#282a36;">
    <div class="mb-3"><strong>Name:</strong> {{ $admin->name }}</div>
    <div class="mb-3"><strong>Email:</strong> {{ $admin->email }}</div>
    <div class="mb-3"><strong>Phone:</strong> {{ $admin->phone }}</div>
    <div class="mb-3"><strong>Joined At:</strong> {{ $admin->created_at->format('Y-m-d') }}</div>

    <a href="{{ route('admin.admins.index') }}" class="btn btn-secondary mt-2">Back to Admins</a>
</div>
@endsection

@push('styles')
<style>
    .btn-secondary {
        display: inline-flex;
        align-items: center;
        gap: 5px;
        padding: 8px 14px;
        background-color: #6b7280;
        color: #fff;
        border: none;
        border-radius: 6px;
        font-weight: 600;
        cursor: pointer;
        transition: background 0.3s;
        text-decoration: none;
    }

    .btn-secondary:hover {
        background-color: #4b5563;
        color: #fff;
        text-decoration: none;
    }
</style>
@endpush