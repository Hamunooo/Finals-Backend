@extends('layouts.admin')

@section('title', 'Edit Product')

@section('content')

<!-- Page Header -->
<div class="mb-8">
    <a href="{{ route('admin.products.index') }}" class="text-green-400 hover:text-green-300 flex items-center space-x-1 mb-4">
        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
        </svg>
        <span>Back to Products</span>
    </a>
    <h1 class="text-3xl font-bold text-white">Edit Product</h1>
</div>

<!-- Form -->
<div class="admin-card rounded-xl p-8 max-w-2xl">
    <form method="POST" action="{{ route('admin.products.update', $product->id) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        
        <!-- Product Name -->
        <div class="mb-6">
            <label class="block text-sm font-semibold text-white mb-2">Product Name *</label>
            <input 
                type="text" 
                name="name" 
                value="{{ old('name', $product->name) }}"
                class="w-full px-4 py-3 rounded-lg bg-gray-700 border border-gray-600 text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-green-500"
                placeholder="Enter product name"
                required
            >
            @error('name')
                <p class="text-red-400 text-sm mt-2">{{ $message }}</p>
            @enderror
        </div>

        <!-- Description -->
        <div class="mb-6">
            <label class="block text-sm font-semibold text-white mb-2">Description *</label>
            <textarea 
                name="description" 
                class="w-full px-4 py-3 rounded-lg bg-gray-700 border border-gray-600 text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-green-500 h-32"
                placeholder="Enter product description"
                required
            >{{ old('description', $product->description) }}</textarea>
            @error('description')
                <p class="text-red-400 text-sm mt-2">{{ $message }}</p>
            @enderror
        </div>

        <!-- Price -->
        <div class="mb-6">
            <label class="block text-sm font-semibold text-white mb-2">Price (₱) *</label>
            <input 
                type="number" 
                name="price" 
                value="{{ old('price', $product->price) }}"
                class="w-full px-4 py-3 rounded-lg bg-gray-700 border border-gray-600 text-white focus:outline-none focus:ring-2 focus:ring-green-500"
                placeholder="0.00"
                step="0.01"
                required
            >
            @error('price')
                <p class="text-red-400 text-sm mt-2">{{ $message }}</p>
            @enderror
        </div>

        <!-- Category -->
        <div class="mb-6">
            <label class="block text-sm font-semibold text-white mb-2">Category *</label>
            <select 
                name="category"
                class="w-full px-4 py-3 rounded-lg bg-gray-700 border border-gray-600 text-white focus:outline-none focus:ring-2 focus:ring-green-500"
                required
            >
                <option value="">Select a category</option>
                <option value="Electronics" {{ old('category', $product->category) === 'Electronics' ? 'selected' : '' }}>Electronics</option>
                <option value="Fashion" {{ old('category', $product->category) === 'Fashion' ? 'selected' : '' }}>Fashion</option>
                <option value="Home" {{ old('category', $product->category) === 'Home' ? 'selected' : '' }}>Home</option>
                <option value="Sports" {{ old('category', $product->category) === 'Sports' ? 'selected' : '' }}>Sports</option>
            </select>
            @error('category')
                <p class="text-red-400 text-sm mt-2">{{ $message }}</p>
            @enderror
        </div>

        <!-- Stock -->
        <div class="mb-6">
            <label class="block text-sm font-semibold text-white mb-2">Stock Quantity</label>
            <input 
                type="number" 
                name="stock" 
                value="{{ old('stock', $product->stock ?? 0) }}"
                class="w-full px-4 py-3 rounded-lg bg-gray-700 border border-gray-600 text-white focus:outline-none focus:ring-2 focus:ring-green-500"
                placeholder="0"
                min="0"
            >
            @error('stock')
                <p class="text-red-400 text-sm mt-2">{{ $message }}</p>
            @enderror
        </div>

        <!-- Image -->
        <div class="mb-8">
            <label class="block text-sm font-semibold text-white mb-2">Product Image</label>
            
            @if($product->image && file_exists(public_path('storage/' . $product->image)))
                <div class="mb-4">
                    <p class="text-gray-400 text-sm mb-2">Current Image:</p>
                    <img 
                        src="{{ asset('storage/' . $product->image) }}" 
                        alt="{{ $product->name }}"
                        class="w-40 h-40 rounded-lg object-cover border border-gray-600"
                    >
                </div>
            @endif
            
            <div class="border-2 border-dashed border-gray-600 rounded-lg p-8 text-center cursor-pointer hover:border-green-500 transition-colors">
                <input 
                    type="file" 
                    name="image" 
                    accept="image/*"
                    class="hidden"
                    id="image-input"
                >
                <svg class="w-12 h-12 text-gray-500 mx-auto mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                </svg>
                <p class="text-gray-400 mb-1">Click to upload or drag and drop</p>
                <p class="text-gray-500 text-sm">PNG, JPG, GIF up to 10MB</p>
                <label for="image-input" class="admin-btn-green mt-4 px-6 py-2 rounded-lg font-semibold inline-block cursor-pointer">
                    Choose File
                </label>
            </div>
            @error('image')
                <p class="text-red-400 text-sm mt-2">{{ $message }}</p>
            @enderror
        </div>

        <!-- Buttons -->
        <div class="flex gap-4">
            <button 
                type="submit" 
                class="admin-btn-green px-8 py-3 rounded-lg font-semibold flex items-center space-x-2"
            >
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                </svg>
                <span>Update Product</span>
            </button>
            <a 
                href="{{ route('admin.products.index') }}" 
                class="px-8 py-3 rounded-lg font-semibold bg-gray-700 text-white hover:bg-gray-600 transition-colors"
            >
                Cancel
            </a>
        </div>
    </form>
</div>

@endsection
