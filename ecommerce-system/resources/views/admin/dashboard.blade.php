@extends('layouts.admin')

@section('title', 'Admin Dashboard')

@section('content')

<!-- Welcome Section -->
<div class="mb-8">
    <div class="admin-card rounded-xl p-8 border-l-4 border-green-500">
        <h1 class="text-4xl font-bold text-white mb-2">Welcome back, Admin!</h1>
        <p class="text-gray-400">Manage your e-commerce platform</p>
    </div>
</div>

<!-- Dashboard Cards -->
<div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
    <!-- Products Card -->
    <div class="admin-card rounded-xl p-8 hover:shadow-lg transition-shadow">
        <div class="flex items-center justify-between mb-4">
            <h3 class="text-lg font-bold text-white">Products</h3>
            <svg class="w-8 h-8 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m0 0l8 4m-8-4v10l8 4m0-10l8 4m-8-4v10"></path>
            </svg>
        </div>
        <p class="text-4xl font-bold text-white mb-4">{{ $productCount }}</p>
        <p class="text-gray-400 text-sm mb-4">Total products in inventory</p>
        <a href="{{ route('admin.products.index') }}" class="admin-btn-green px-6 py-2 rounded-lg text-sm font-semibold inline-block">
            Manage Products
        </a>
    </div>

    <!-- Total Revenue Card -->
    <div class="admin-card rounded-xl p-8 hover:shadow-lg transition-shadow">
        <div class="flex items-center justify-between mb-4">
            <h3 class="text-lg font-bold text-white">Total Revenue</h3>
            <svg class="w-8 h-8 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
            </svg>
        </div>
        <p class="text-4xl font-bold text-white mb-4">₱{{ number_format($totalRevenue, 2) }}</p>
        <p class="text-gray-400 text-sm">From all orders</p>
    </div>
</div>

<!-- Quick Stats -->
<div class="admin-card rounded-xl p-8">
    <h2 class="text-xl font-bold text-white mb-6">Quick Actions</h2>
    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
        <a href="{{ route('admin.products.create') }}" class="admin-btn-green px-6 py-4 rounded-lg font-semibold flex items-center space-x-3 text-center justify-center hover:shadow-lg transition-shadow">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
            </svg>
            <span>Add New Product</span>
        </a>
        <a href="{{ route('admin.products.index') }}" class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-4 rounded-lg font-semibold flex items-center space-x-3 justify-center transition-colors">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
            </svg>
            <span>View All Products</span>
        </a>
    </div>
</div>

@endsection
