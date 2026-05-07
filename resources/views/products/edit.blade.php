<!DOCTYPE html>
<html>
<head><title>Edit Product</title></head>
<body>

<h1>Edit Product</h1>
<a href="{{ route('products.index') }}">← Back to Products</a>

<form action="{{ route('products.update', $product->id) }}" method="POST"
      enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <p>
        <label>Product Name:</label><br>
        <input type="text" name="name"
               value="{{ old('name', $product->name) }}">
        @error('name')
            <span style="color:red">{{ $message }}</span>
        @enderror
    </p>

    <p>
        <label>Price:</label><br>
        <input type="number" name="price" step="0.01"
               value="{{ old('price', $product->price) }}">
        @error('price')
            <span style="color:red">{{ $message }}</span>
        @enderror
    </p>

    <p>
        <label>Quantity:</label><br>
        <input type="number" name="quantity"
               value="{{ old('quantity', $product->quantity) }}">
        @error('quantity')
            <span style="color:red">{{ $message }}</span>
        @enderror
    </p>

    <p>
        <label>Current Image:</label><br>
        @if($product->image)
            <img src="{{ asset('storage/'.$product->image) }}" width="80">
        @else
            No image
        @endif
    </p>

    <p>
        <label>Change Image (optional):</label><br>
        <input type="file" name="image" accept="image/*">
        @error('image')
            <span style="color:red">{{ $message }}</span>
        @enderror
    </p>

    <button type="submit">Update Product</button>
</form>

</body>
</html>