<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100 min-h-screen">

    <!-- Navbar -->
    <nav class="bg-white shadow px-6 py-4 flex justify-between items-center">
        <h1 class="text-xl font-bold text-gray-800">🛒 E-Commerce System</h1>
        <div class="flex items-center gap-4">
            <span class="text-sm text-gray-600">
                Logged in as: <strong>{{ Auth::user()->name }}</strong>
                ({{ Auth::user()->role }})
            </span>
            <a href="{{ route('login') }}"
                class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600 text-sm">
                    Logout
            </a>
            </form>
        </div>
    </nav>

    <!-- Main Content -->
    <div class="max-w-6xl mx-auto mt-8 px-4">

        <!-- Header -->
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-2xl font-bold text-gray-700">Products</h2>
            @if(Auth::user()->role === 'seller' || Auth::user()->role === 'admin')
                <a href="{{ route('products.create') }}"
                   class="bg-green-500 text-white px-5 py-2 rounded-lg hover:bg-green-600 font-medium">
                    + Add New Product
                </a>
            @endif
        </div>

        <!-- Success Message -->
        @if(session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                ✅ {{ session('success') }}
            </div>
        @endif

        <!-- Products Table -->
        <div class="bg-white rounded-xl shadow overflow-hidden">
            <table class="w-full text-sm text-left">
                <thead class="bg-gray-50 text-gray-600 uppercase text-xs">
                    <tr>
                        <th class="px-6 py-4">Image</th>
                        <th class="px-6 py-4">Name</th>
                        <th class="px-6 py-4">Price</th>
                        <th class="px-6 py-4">Quantity</th>
                        <th class="px-6 py-4">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    @forelse($products as $product)
                    <tr class="hover:bg-gray-50">
                        <td class="px-6 py-4">
                            @if($product->image)
                                <img src="{{ asset('storage/'.$product->image) }}"
                                     class="w-16 h-16 object-cover rounded-lg">
                            @else
                                <div class="w-16 h-16 bg-gray-200 rounded-lg flex items-center justify-center text-gray-400 text-xs">
                                    No image
                                </div>
                            @endif
                        </td>
                        <td class="px-6 py-4 font-medium text-gray-800">
                            {{ $product->name }}
                        </td>
                        <td class="px-6 py-4 text-gray-600">
                            ₱{{ number_format($product->price, 2) }}
                        </td>
                        <td class="px-6 py-4 text-gray-600">
                            {{ $product->quantity }}
                        </td>
                        <td class="px-6 py-4">
                            <div class="flex gap-2">
                                <a href="{{ route('products.edit', $product->id) }}"
                                   class="bg-blue-500 text-white px-3 py-1 rounded hover:bg-blue-600 text-xs">
                                    Edit
                                </a>
                                <form action="{{ route('products.destroy', $product->id) }}"
                                      method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                        onclick="return confirm('Delete this product?')"
                                        class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-600 text-xs">
                                        Delete
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="px-6 py-8 text-center text-gray-400">
                            No products yet. Click "+ Add New Product" to get started!
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

</body>
</html>