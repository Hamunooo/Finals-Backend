<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>My Purchases - Cartify</title>
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
        <a href="{{ route('customer.browse') }}"
           class="text-sm" style="color:#ffffff;">Browse Products</a>
        <a href="{{ route('dashboard') }}"
           class="text-sm" style="color:#ffffff;">Dashboard</a>
        <span class="text-xs px-3 py-1 rounded-full"
              style="background:#33c432; color:#ffffff;">
            {{ ucfirst(Auth::user()->role) }}
        </span>
        <span class="text-sm" style="color:#ffffff;">
            {{ Auth::user()->name }}
        </span>
    </div>
</nav>

<div class="max-w-6xl mx-auto mt-8 px-4">
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-2xl font-bold" style="color:#043044;">My Purchases</h2>
        <a href="{{ route('customer.browse') }}"
           class="text-sm px-5 py-2 rounded-lg font-medium"
           style="background:#33c432; color:#ffffff;">
            Browse More
        </a>
    </div>

    @if(session('success'))
        <div class="rounded-lg px-4 py-3 mb-4"
             style="background:#E1F5EE; border:1px solid #33c432; color:#085041;">
            {{ session('success') }}
        </div>
    @endif

    <div class="bg-white rounded-2xl shadow overflow-hidden">
        <table class="w-full text-sm text-left">
            <thead style="background-color: #043044;">
                <tr>
                    <th class="px-6 py-4" style="color:#ffffff;">Product</th>
                    <th class="px-6 py-4" style="color:#ffffff;">Image</th>
                    <th class="px-6 py-4" style="color:#ffffff;">Price</th>
                    <th class="px-6 py-4" style="color:#ffffff;">Qty</th>
                    <th class="px-6 py-4" style="color:#ffffff;">Total</th>
                    <th class="px-6 py-4" style="color:#ffffff;">Action</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100">
                @forelse($purchases as $purchase)
                <tr class="hover:bg-gray-50">
                    <td class="px-6 py-4 font-medium text-gray-800">
                        {{ $purchase->product->name ?? 'N/A' }}
                    </td>
                    <td class="px-6 py-4">
                        @if($purchase->product && $purchase->product->image)
                            <img src="{{ asset('storage/'.$purchase->product->image) }}"
                                 class="w-14 h-14 object-cover rounded-lg">
                        @else
                            <div class="w-14 h-14 rounded-lg flex items-center
                                        justify-center text-xs text-gray-400"
                                 style="background:#f3f4f6;">No image</div>
                        @endif
                    </td>
                    <td class="px-6 py-4 text-gray-600">
                        ₱{{ number_format($purchase->product->price ?? 0, 2) }}
                    </td>
                    <td class="px-6 py-4 text-gray-600">
                        {{ $purchase->quantity }}
                    </td>
                    <td class="px-6 py-4 font-medium" style="color:#043044;">
                        ₱{{ number_format(($purchase->product->price ?? 0) * $purchase->quantity, 2) }}
                    </td>
                    <td class="px-6 py-4">
                        <form action="{{ route('purchases.destroy', $purchase->id) }}"
                              method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                    onclick="return confirm('Remove this?')"
                                    class="text-xs px-3 py-1 rounded-lg"
                                    style="background:#fee2e2; color:#991b1b;">
                                Remove
                            </button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="px-6 py-10 text-center text-gray-400">
                        No purchases yet. Browse products to get started!
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
</body>
</html>