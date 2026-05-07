<!DOCTYPE html>
<html>
<head><title>Products</title></head>
<body>

<h1>Products</h1>

@if(session('success'))
    <p style="color:green">{{ session('success') }}</p>
@endif

@if(Auth::user()->role === 'seller' || Auth::user()->role === 'admin')
    <a href="{{ route('products.create') }}">+ Add New Product</a>
@endif

<table border="1" cellpadding="8">
    <tr>
        <th>Image</th>
        <th>Name</th>
        <th>Price</th>
        <th>Quantity</th>
        <th>Actions</th>
    </tr>
    @foreach($products as $product)
    <tr>
        <td>
            @if($product->image)
                <img src="{{ asset('storage/'.$product->image) }}" width="60">
            @else
                No image
            @endif
        </td>
        <td>{{ $product->name }}</td>
        <td>{{ $product->price }}</td>
        <td>{{ $product->quantity }}</td>
        <td>
            <a href="{{ route('products.edit', $product->id) }}">Edit</a>
            <form action="{{ route('products.destroy', $product->id) }}"
                  method="POST" style="display:inline">
                @csrf
                @method('DELETE')
                <button type="submit"
                    onclick="return confirm('Delete this product?')">
                    Delete
                </button>
            </form>
        </td>
    </tr>
    @endforeach
</table>

</body>
</html>