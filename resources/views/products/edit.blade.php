<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Product</title>
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
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit"
                    class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600 text-sm">
                    Logout
                </button>
            </form>
        </div>
    </nav>

    <!-- Main Content -->
    <div class="max-w-2xl mx-auto mt-8 px-4">

        <!-- Back -->
        <div class="flex items-center gap-3 mb-6">
            <a href="{{ route('products.index') }}"
               class="text-gray-500 hover:text-gray-700 text-sm">
                ← Back to Products
            </a>
        </div>

        <!-- Form Card -->
        <div class="bg-white rounded-xl shadow p-6">
            <h2 class="text-2xl font-bold text-gray-700 mb-6">Edit Product</h2>

            <form action="{{ route('products.update', $product->id) }}" method="POST"
                  enctype="multipart/form-data" class="space-y-5">
                @csrf
                @method('PUT')

                <!-- Name -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">
                        Product Name
                    </label>
                    <input type="text" name="name"
                           value="{{ old('name', $product->name) }}"
                           class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400">
                    @error('name')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Price -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">
                        Price (₱)
                    </label>
                    <input type="number" name="price" step="0.01" min="0"
                           value="{{ old('price', $product->price) }}"
                           class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400">
                    @error('price')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Quantity -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">
                        Quantity
                    </label>
                    <input type="number" name="quantity" min="0"
                           value="{{ old('quantity', $product->quantity) }}"
                           class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400">
                    @error('quantity')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Current Image -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">
                        Current Image
                    </label>
                    @if($product->image)
                        <img src="{{ asset('storage/'.$product->image) }}"
                             class="w-24 h-24 object-cover rounded-lg border mb-2">
                    @else
                        <div class="w-24 h-24 bg-gray-200 rounded-lg flex items-center justify-center text-gray-400 text-xs mb-2">
                            No image
                        </div>
                    @endif
                </div>

                <!-- Change Image -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">
                        Change Image (optional)
                    </label>
                    <input type="file" name="image" accept="image/*"
                           class="w-full border border-gray-300 rounded-lg px-4 py-2 bg-white">
                    <p class="text-xs text-gray-400 mt-1">
                        Leave empty to keep current image
                    </p>
                    @error('image')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Buttons -->
                <div class="flex gap-3 pt-2">
                    <button type="submit"
                        class="bg-blue-500 text-white px-6 py-2 rounded-lg hover:bg-blue-600 font-medium">
                        Update Product
                    </button>
                    <a href="{{ route('products.index') }}"
                       class="bg-gray-200 text-gray-700 px-6 py-2 rounded-lg hover:bg-gray-300 font-medium">
                        Cancel
                    </a>
                </div>

            </form>
        </div>
    </div>

</body>
</html>