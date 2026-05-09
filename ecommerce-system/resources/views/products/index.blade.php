@extends('layouts.app')

@section('title', 'Products')

@section('content')

<!-- Hero Section -->
<div class="mb-12">
    <div class="bg-gradient-to-r from-purple-600 via-blue-600 to-cyan-600 rounded-2xl p-8 md:p-12 shadow-2xl">
        <div class="flex flex-col md:flex-row items-center justify-between gap-8">
            <div class="flex-1">
                <h1 class="text-4xl md:text-5xl font-bold text-white mb-3">
                    Browse Our <span class="bg-gradient-to-r from-yellow-300 to-pink-300 bg-clip-text text-transparent">Premium</span> Collection
                </h1>
                <p class="text-slate-100 text-lg">Quality products, carefully curated and delivered to your door</p>
            </div>
        </div>
    </div>
</div>

<!-- Search Bar -->
<div class="mb-8">
    <div class="max-w-md mx-auto md:mx-0">
        <form method="GET" class="relative">
            <input
                type="text"
                name="search"
                class="w-full px-6 py-3 rounded-xl bg-slate-800 border border-slate-700 text-white placeholder-slate-400 focus:outline-none focus:ring-2 focus:ring-purple-500 transition-all duration-200"
                placeholder="Search products..."
                value="{{ request('search') }}"
            >
            <button type="submit" class="absolute right-3 top-1/2 transform -translate-y-1/2 text-slate-400 hover:text-slate-200">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                </svg>
            </button>
        </form>
    </div>
</div>

<!-- Category Filter -->
<div class="mb-8 flex flex-wrap gap-3">
    <a href="{{ route('products.index') }}"
       class="px-5 py-2 rounded-lg {{ !request('category') ? 'bg-gradient-secondary text-white' : 'bg-slate-800 text-slate-300 hover:bg-slate-700' }} font-semibold transition-all duration-200 text-sm">
        All Products
    </a>

    <a href="?category=Electronics"
       class="px-5 py-2 rounded-lg {{ request('category') === 'Electronics' ? 'bg-gradient-secondary text-white' : 'bg-slate-800 text-slate-300 hover:bg-slate-700' }} font-semibold transition-all duration-200 text-sm">
        <span class="inline-block mr-2">⚡</span>Electronics
    </a>

    <a href="?category=Fashion"
       class="px-5 py-2 rounded-lg {{ request('category') === 'Fashion' ? 'bg-gradient-secondary text-white' : 'bg-slate-800 text-slate-300 hover:bg-slate-700' }} font-semibold transition-all duration-200 text-sm">
        <span class="inline-block mr-2">👗</span>Fashion
    </a>

    <a href="?category=Home"
       class="px-5 py-2 rounded-lg {{ request('category') === 'Home' ? 'bg-gradient-secondary text-white' : 'bg-slate-800 text-slate-300 hover:bg-slate-700' }} font-semibold transition-all duration-200 text-sm">
        <span class="inline-block mr-2">🏠</span>Home
    </a>
</div>

<!-- Products Grid -->
@forelse($products as $product)
    @if($loop->first)
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
    @endif

    <div class="card-hover group">
        <div class="relative overflow-hidden rounded-xl bg-slate-800 shadow-lg h-full flex flex-col">
            <!-- Image Container -->
            <div class="relative h-64 overflow-hidden bg-gradient-to-br from-purple-600 to-pink-600 flex items-center justify-center">
                @if($product->image && file_exists(public_path('storage/' . $product->image)))
                    <img
                        src="{{ asset('storage/' . $product->image) }}"
                        alt="{{ $product->name }}"
                        class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500"
                    >
                @else
                    <div class="text-center">
                        <svg class="w-16 h-16 text-white mx-auto" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M4 3a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V5a2 2 0 00-2-2H4zm12 12H4l4-8 3 6 2-4 3 6z" clip-rule="evenodd"></path>
                        </svg>
                        <p class="text-white text-sm mt-2">{{ $product->name }}</p>
                    </div>
                @endif
                <!-- Overlay Badge -->
                <div class="absolute top-4 right-4">
                    <span class="inline-block px-3 py-1 rounded-full bg-purple-600 text-white text-xs font-semibold backdrop-blur">
                        {{ $product->category }}
                    </span>
                </div>
                <!-- Discount Badge (optional) -->
                <div class="absolute top-4 left-4 hidden group-hover:block">
                    <span class="inline-block px-3 py-1 rounded-full bg-red-600 text-white text-xs font-bold animate-pulse">
                        NEW
                    </span>
                </div>
            </div>

            <!-- Content -->
            <div class="p-5 flex-1 flex flex-col">
                <h3 class="text-lg font-bold text-white mb-2 line-clamp-2 group-hover:text-purple-300 transition-colors">
                    {{ $product->name }}
                </h3>

                <p class="text-slate-400 text-sm mb-4 line-clamp-2 flex-1">
                    {{ Str::limit($product->description, 60) }}
                </p>

                <div class="flex items-center justify-between mb-4">
                    <div class="flex items-center space-x-1">
                        <svg class="w-4 h-4 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                        </svg>
                        <span class="text-sm text-slate-300 font-semibold">4.8</span>
                    </div>
                    <span class="text-xl font-bold text-transparent bg-gradient-to-r from-purple-400 to-pink-400 bg-clip-text">
                        ₱{{ number_format($product->price, 2) }}
                    </span>
                </div>

                <button class="btn-glow add-to-cart w-full px-4 py-3 rounded-lg bg-gradient-secondary text-white font-bold text-sm hover:shadow-lg transition-all duration-300 flex items-center justify-center space-x-2 group/btn" data-product-id="{{ $product->id }}">
                    <svg class="w-5 h-5 group-hover/btn:scale-110 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                    </svg>
                    <span>Add to Cart</span>
                </button>
            </div>
        </div>
    </div>

    @if($loop->last)
        </div>
    @endif

@empty

<div class="text-center py-16">
    <svg class="w-20 h-20 mx-auto text-slate-600 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4"></path>
    </svg>
    <h3 class="text-2xl font-bold text-white mb-2">No products found</h3>
    <p class="text-slate-400">Try adjusting your search or browse other categories</p>
</div>

@endforelse

<script>
document.addEventListener('DOMContentLoaded', function() {
    document.querySelectorAll('.add-to-cart').forEach(button => {
        button.addEventListener('click', function(e) {
            e.preventDefault();
            const productId = this.dataset.productId;
            
            fetch('{{ route("cart.add") }}', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                },
                body: JSON.stringify({
                    product_id: productId,
                    quantity: 1
                })
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    // Show success message
                    showNotification('Product added to cart!', 'success');
                    updateCartCount();
                } else {
                    showNotification(data.message || 'Failed to add to cart', 'error');
                }
            })
            .catch(error => {
                console.error('Error:', error);
                showNotification('An error occurred', 'error');
            });
        });
    });

    function showNotification(message, type) {
        const notification = document.createElement('div');
        notification.className = `fixed top-4 right-4 px-6 py-3 rounded-lg font-semibold text-white z-50 animate-slideInUp ${
            type === 'success' ? 'bg-green-600' : 'bg-red-600'
        }`;
        notification.textContent = message;
        
        document.body.appendChild(notification);
        
        setTimeout(() => {
            notification.remove();
        }, 3000);
    }

    function updateCartCount() {
        fetch('{{ route("cart.count") }}')
            .then(response => response.json())
            .then(data => {
                const cartBadge = document.querySelector('[data-cart-badge]');
                if (cartBadge) {
                    cartBadge.textContent = data.count;
                }
            });
    }
});
</script>

@endsection