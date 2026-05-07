<!DOCTYPE html>
<html>
<head><title>Add Product</title></head>
<body>

<h1>Add New Product</h1>
<a href="{{ route('products.index') }}">← Back to Products</a>

<form action="{{ route('products.store') }}" method="POST"
      enctype="multipart/form-data">
    @csrf

    <p>
        <label>Product Name:</label><br>
        <input type="text" name="name" value="{{ old('name') }}">
        @error('name')
            <span style="color:red">{{ $message }}</span>
        @enderror
    </p>

    <p>
        <label>Price:</label><br>
        <input type="number" name="price" step="0.01"
               value="{{ old('price') }}">
        @error('price')
            <span style="color:red">{{ $message }}</span>
        @enderror
    </p>

    <p>
        <label>Quantity:</label><br>
        <input type="number" name="quantity" value="{{ old('quantity') }}">
        @error('quantity')
            <span style="color:red">{{ $message }}</span>
        @enderror
    </p>

    <p>
        <label>Product Image (optional):</label><br>
        <input type="file" name="image" accept="image/*">
        @error('image')
            <span style="color:red">{{ $message }}</span>
        @enderror
    </p>

    <button type="submit">Add Product</button>
</form>

</body>
</html>