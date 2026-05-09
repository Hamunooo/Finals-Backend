<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Browse Products - Cartify</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="min-h-screen" style="background-color: #f3f4f6;">

<nav class="shadow px-6 py-4 flex justify-between items-center"
     style="background-color: #043044;">
    <div class="flex items-center gap-3">
        <img src="{{ asset('images/logo2.png') }}" class="h-10 w-auto">
        <span class="text-xl font-bold" style="color: #33c432;">Cartify</span>
    </div>
    <div class="flex items-center gap-4">
        <a href="{{ route('customer.purchases') }}"
           class="text-sm" style="color: #ffffff;">My Purchases</a>
        <a href="{{ route('dashboard') }}"
           class="text-sm" style="color: #ffffff;">Dashboard</a>
        <span class="text-xs px-3 py-1 rounded-full"
              style="background:#33c432; color:#ffffff;">
            {{ ucfirst(Auth::user()->role) }}
        </span>
        <span class="text-sm" style="color: #ffffff;">
            {{ Auth::user()->name }}
        </span>
    </div>
</nav>

<div class="max-w-7xl mx-auto mt-8 px-4">
    <h2 class="text-2xl font-bold mb-6" style="color: #043044;">
        Browse Products
    </h2>

    @if(session('success'))
        <div class="rounded-lg px-4 py-3 mb-4"
             style="background:#E1F5EE; border:1px solid #33c432; color:#085041;">
            {{ session('success') }}
        </div>
    @endif

    <div class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-4 gap-6">
        @forelse($products as $product)
        <div class="bg-white rounded-2xl shadow-sm overflow-hidden hover:shadow-md transition">
            @if($product->image)
                <img src="{{ asset('storage/'.$product->image) }}"
                     class="w-full h-48 object-cover">
            @else
                <div class="w-full h-48 flex items-center justify-center"
                     style="background:#f3f4f6;">
                    <span class="text-gray-400 text-sm">No image</span>
                </div>
            @endif
            <div class="p-4">
                <h3 class="font-semibold text-gray-800">{{ $product->name }}</h3>
                <p class="text-lg font-bold mt-1" style="color:#043044;">
                    ₱{{ number_format($product->price, 2) }}
                </p>
                <p class="text-xs text-gray-400 mt-1">
                    {{ $product->quantity }} in stock
                </p>
                <form action="{{ route('purchases.store') }}" method="POST" class="mt-3">
                    @csrf
                    <input type="hidden" name="product_id" value="{{ $product->id }}">
                    <div class="flex gap-2">
                        <input type="number" name="quantity" value="1"
                               min="1" max="{{ $product->quantity }}"
                               class="w-16 border rounded-lg px-2 py-1 text-sm text-center">
                        <button type="submit"
                                class="flex-1 text-sm font-medium py-2 rounded-lg"
                                style="background:#33c432; color:#ffffff;">
                            Buy
                        </button>
                    </div>
                </form>
            </div>
        </div>
        @empty
        <div class="col-span-4 text-center py-12 text-gray-400">
            No products available yet.
        </div>
        @endforelse
    </div>
</div>
</body>
</html>