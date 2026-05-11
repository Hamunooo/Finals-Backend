@extends('layouts.admin')

@section('title', 'Manage Products')

@section('content')

<!-- Page Header -->
<div class="flex items-center justify-between mb-8">
    <div>
        <h1 class="text-3xl font-bold text-white mb-2">Products</h1>
        <p class="text-gray-400">Manage your product listings</p>
    </div>
    <a href="{{ route('admin.products.create') }}" class="admin-btn-green px-6 py-3 rounded-lg font-semibold flex items-center space-x-2">
        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
        </svg>
        <span>Add New Product</span>
    </a>
</div>

<!-- Search Bar -->
<div class="mb-6">
    <form method="GET" class="flex gap-3">
        <input 
            type="text" 
            name="search" 
            placeholder="Search products..." 
            value="{{ request('search') }}"
            class="flex-1 px-4 py-3 rounded-lg bg-gray-700 border border-gray-600 text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-green-500"
        >
        <button type="submit" class="admin-btn-green px-6 py-3 rounded-lg font-semibold">
            Search
        </button>
    </form>
</div>

<!-- Products Table -->
<div class="admin-card rounded-xl overflow-hidden">
    <table class="w-full">
        <thead class="bg-green-600/20 border-b border-gray-600">
            <tr>
                <th class="px-6 py-4 text-left font-semibold text-white">PRODUCT</th>
                <th class="px-6 py-4 text-left font-semibold text-white">CATEGORY</th>
                <th class="px-6 py-4 text-right font-semibold text-white">PRICE</th>
                <th class="px-6 py-4 text-center font-semibold text-white">STOCK</th>
                <th class="px-6 py-4 text-right font-semibold text-white">ACTIONS</th>
            </tr>
        </thead>
        <tbody>
            @forelse($products as $product)
                <tr class="border-b border-gray-700 hover:bg-green-600/5 transition-colors">
                    <td class="px-6 py-4">
                        <div class="flex items-center space-x-3">
                            @if($product->image && file_exists(public_path('storage/' . $product->image)))
                                <img 
                                    src="{{ asset('storage/' . $product->image) }}" 
                                    alt="{{ $product->name }}"
                                    class="w-12 h-12 rounded object-cover"
                                >
                            @else
                                <div class="w-12 h-12 rounded bg-gray-600 flex items-center justify-center">
                                    <svg class="w-6 h-6 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                    </svg>
                                </div>
                            @endif
                            <div>
                                <p class="font-semibold text-white">{{ $product->name }}</p>
                                <p class="text-xs text-gray-400">ID: #{{ str_pad($product->id, 5, '0', STR_PAD_LEFT) }}</p>
                            </div>
                        </div>
                    </td>
                    <td class="px-6 py-4 text-gray-300">
                        <span class="inline-block px-3 py-1 bg-blue-500/20 text-blue-300 text-sm rounded-full">
                            {{ $product->category }}
                        </span>
                    </td>
                    <td class="px-6 py-4 text-right font-semibold text-white">
                        ₱{{ number_format($product->price, 2) }}
                    </td>
                    <td class="px-6 py-4 text-center">
                        <span class="inline-block px-3 py-1 {{ $product->stock > 0 ? 'bg-green-500/20 text-green-300' : 'bg-red-500/20 text-red-300' }} text-sm rounded-full font-semibold">
                            {{ $product->stock ?? 0 }}
                        </span>
                    </td>
                    <td class="px-6 py-4 text-right">
                        <div class="flex items-center justify-end space-x-2">
                            <a 
                                href="{{ route('admin.products.edit', $product->id) }}" 
                                class="px-4 py-2 bg-blue-600 hover:bg-blue-700 rounded text-sm font-semibold text-white transition-colors flex items-center space-x-1"
                            >
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                </svg>
                                <span>Edit</span>
                            </a>
                            <form method="POST" action="{{ route('admin.products.destroy', $product->id) }}" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button 
                                    type="submit" 
                                    class="admin-btn-danger px-4 py-2 rounded text-sm font-semibold flex items-center space-x-1 transition-colors"
                                    onclick="return confirm('Are you sure you want to delete this product?')"
                                >
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                    </svg>
                                    <span>Delete</span>
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" class="px-6 py-12 text-center">
                        <svg class="w-16 h-16 mx-auto text-gray-600 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4"></path>
                        </svg>
                        <h3 class="text-xl font-bold text-white mb-2">No products found</h3>
                        <p class="text-gray-400 mb-4">Start by creating your first product</p>
                        <a href="{{ route('admin.products.create') }}" class="admin-btn-green px-6 py-3 rounded-lg font-semibold inline-block">
                            Create Product
                        </a>
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>

<!-- Pagination -->
@if($products->hasPages())
    <div class="mt-6">
        {{ $products->links() }}
    </div>
@endif

@endsection
